<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblpazaryerleri extends Model
{
    use HasFactory;
    public $table = 'tblpazaryerleri';
    public $primaryKey = "tblpazaryeri_id";
    protected $fillable = [
        'tblpazaryeri_id',
        'tblpazaryeri_adi',
        'tblpazaryeri_kodu',
        'tblpazaryeri_durum',
    ];

    public $timestamps;
}
