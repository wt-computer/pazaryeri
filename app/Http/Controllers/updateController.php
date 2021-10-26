<?php

namespace App\Http\Controllers;

use App\Models\tblproje_alt_versiyon;
use App\Models\tblproje_parametre;
use App\Models\tblproje_versiyon;
use Facade\FlareClient\Stacktrace\File;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;


class updateController extends Controller
{
    public function projekoducheck(Request $request)
    {
        $_token = $request['_token'];
        $proje_kodu = tblproje_parametre::query()
            ->select('tblproje_parametre_deger as projekodu')
            ->where('tblproje_parametre_kod', 1)
            ->first();

        $serveraddress = tblproje_parametre::query()
            ->select('tblproje_parametre_deger as serveraddress')
            ->where('tblproje_parametre_kod', 2)
            ->first();
        $versiyon_no = tblproje_versiyon::query()
            ->select('tblproje_versiyon as proje_versiyon', 'tblproje_veritabani_versiyon as veritabani_versiyon')
            ->first();
        if ($proje_kodu && $serveraddress && $versiyon_no) {
            return $this->updatecheck($proje_kodu, $serveraddress, $versiyon_no);
        } else {
            $message['status'] = 'error';
            $message['message'] = 'Proje Kodu Bulunamadı!';
            return response()->json($message);
        }
    }

    public function updatecheck($proje_kodu, $serveraddress, $versiyon_no)
    {
        $client = new Client();
        $body['_projekod'] = $proje_kodu->projekodu;
        $body['_projeversiyon'] = $versiyon_no->proje_versiyon;
        $body['_veritabaniversiyon'] = $versiyon_no->veritabani_versiyon;
        $res = $client->request('POST', 'http://localhost/guncelleme/api/update', [
            'form_params'=>$body
        ]);
        $result = json_decode($res->getBody(), true);
        return response()->json($result);
        //return $this->downloads($result);
    }

    public function downloads(Request $request)
    {
        $dosyaurl = $request['_updateserver'];
        $dosyauzanti = $request['_updateuzanti'];
        $dosyayolu = $request['_updatedosyayolu'];
        $dosyayolualt = $request['_updatedosyayolualt'];
        $yeniversiyon = $request['_updateversiyon'];
        $projeaciklama = $request['_updateaciklama'];
        $projeguncelversiyon = $request['_updateguncelversiyon'];
        $projeversiyonid = $request['_updateprojeversiyonid'];
        $dosyaoku = $file =  file_get_contents($dosyaurl, true);

        if($dosyaoku) {
            $dosyayaz = Storage::put($dosyauzanti, $file);

            if ($dosyayaz) {
                $dosyakopyala = (new Filesystem)->copyDirectory(storage_path('app/downloads'), $dosyayolu($dosyayolualt));
                if ($dosyakopyala) {
                    $dosyasil = Storage::delete($dosyauzanti);
                    if($dosyasil)
                    {
                        $proje_guncelle = tblproje_alt_versiyon::query()
                            ->insert([
                                'tblproje_versiyon_id' => $projeversiyonid,
                                'tblproje_aciklama' => $projeaciklama,
                                'tblproje_guncel_versiyon' => $projeguncelversiyon,
                                'tblproje_deger' => $dosyayolu,
                            ]);

                        if($proje_guncelle)
                        {
                            $message['status'] = 'success';
                            $message['message'] = $projeaciklama .' Güncellendi';
                            return response()->json($message);
                        }
                        else
                        {
                            $message['status'] = 'error';
                            $message['message'] = 'Bir Hata Oluştu!';
                            return response()->json($message);
                        }
                    }
                    else{
                        $message['status'] = 'error';
                        $message['message'] = 'Dosya Silme Başarısız!';
                        return response()->json($message);
                    }

                }
                else{
                    $message['status'] = 'error';
                    $message['message'] = 'Dosya Kopyalama Başarısız!';
                    return response()->json($message);
                }
            }
            else{
                $message['status'] = 'error';
                $message['message'] = 'Dosya Yazma Başarısız!';
                return response()->json($message);
            }
        }
        else{
            $message['status'] = 'error';
            $message['message'] = 'Dosya Okuma Başarısız!';
            return response()->json($message);
        }
    }

    public function success(Request $request)
    {
        $projesurum = $request['_updatesuccess'];
        $date = Date('Y-m-d H:i:s');
        $projesurumguncelle = tblproje_versiyon::query()
            ->update(['tblproje_versiyon'=>$projesurum, 'tblproje_versiyon_tarih'=>$date]);
        if($projesurumguncelle)
        {
            $message['status'] = 'success';
            $message['message'] = 'Güncelleme Başarıyla ' . $projesurum . ' Sürümüne Güncellendi';
            return response()->json($message);
        }
        else
        {
            $message['status'] = 'error';
            $message['message'] = 'Güncelleme Hatası';
            return response()->json($message);
        }
    }

    public function versiyon(Request $request){

        $proje_kodu = tblproje_parametre::query()
            ->select('tblproje_parametre_deger as projekodu')
            ->where('tblproje_parametre_kod', 1)
            ->first();


        $versiyon_no = tblproje_versiyon::query()
            ->select('tblproje_versiyon as proje_versiyon', 'tblproje_veritabani_versiyon as veritabani_versiyon')
            ->first();
        if ($proje_kodu && $versiyon_no) {
            $versiyon['versiyon_no'] = $versiyon_no;
            $versiyon['proje_kodu'] = $proje_kodu;
            return response()->json($versiyon);

        } else {
            $message['status'] = 'error';
            $message['message'] = 'Versiyon Bilgileri Bulunamadı!';
            return response()->json($message);
        }
    }
}
