<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblproje_parametre extends Model
{
    use HasFactory;

    public $table = 'tblproje_parametre';
    public $primaryKey = "tblproje_parametre_id";
    protected $fillable = [
        'tblproje_parametre_id',
        'tblproje_parametre_kod',
        'tblproje_parametre_deger',
        'tblproje_parametre_aciklama',
    ];

    public $timestamps;
}
