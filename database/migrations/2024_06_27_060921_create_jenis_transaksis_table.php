<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 17)->unique();
            $table->string('nama_transaksi');
            $table->enum('jenis_transaksi', ['pemasukan', 'pengeluaran']);
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
        Schema::dropIfExists('jenis_transaksi');
    }
}