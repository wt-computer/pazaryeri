<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblprojeParametre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproje_parametre', function (Blueprint $table) {
            $table->id('tblproje_parametre_id');
            $table->string('tblproje_parametre_kod');
            $table->string('tblproje_parametre_deger');
            $table->string('tblproje_parametre_aciklama');
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
