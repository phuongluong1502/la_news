<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tins', function (Blueprint $table) {
        $table->increments('idTin');
        $table->string('TieuDe');
        $table->string('TomTat',1000);
        $table->string('urlHinh');
        $table->date('Ngay');
        $table->integer('idUser');
        $table->text('Content');
        $table->integer('idLT');
        $table->integer('idTL');
        $table->integer('SoLanXem');
        $table->integer('idTL');
        $table->boolean('TinNoiBat');
        $table->boolean('AnHien');
        $table->string('tags',2000);
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
        Schema::dropIfExists('tins');
    }
}
