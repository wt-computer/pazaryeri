<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblproje_versiyon extends Model
{
    use HasFactory;

    public $table = 'tblproje_versiyon';
    public $primaryKey = "tblproje_versiyon_id";
    protected $fillable = [
        'tblproje_versiyon_id',
        'tblproje_veritabani_versiyon',
        'tblproje_versiyon',
        'tblproje_versiyon_tarih',
        'tblproje_veritabani_versiyon_tarih',
    ];

    public $timestamps;
}
