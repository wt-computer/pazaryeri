<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblproje_alt_versiyon extends Model
{
    use HasFactory;
    public $table = 'tblproje_alt_versiyon';
    public $primaryKey = "tblproje_alt_versiyon_id";
    protected $fillable = [
        'tblproje_alt_versiyon_id',
        'tblproje_versiyon_id',
        'tblproje_deger',
        'tblproje_aciklama',
        'tblproje_uzanti',
        'tblproje_dosyayolu',
        'tblproje_dosyayolu_alt',
        'tblproje_guncel_versiyon',
    ];

    public $timestamps;
}
