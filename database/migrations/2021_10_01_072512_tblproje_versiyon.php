<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblprojeVersiyon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproje_versiyon', function (Blueprint $table) {
            $table->id('tblproje_versiyon_id');
            $table->string('tblproje_veritabani_versiyon');
            $table->string('tblproje_versiyon');
            $table->date('tblproje_versiyon_tarih');
            $table->date('tblproje_veritabani_versiyon_tarih');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
