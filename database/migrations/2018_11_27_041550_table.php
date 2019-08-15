<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daerah', function (Blueprint $table) {
            $table->increments('id_daerah');
            $table->string('kabupaten');
            $table->timestamps();
        });

        Schema::create('komoditi', function (Blueprint $table) {
            $table->increments('id_komoditi');
            $table->string('nama_komoditi');
            $table->timestamps();
        });

        Schema::create('uml', function (Blueprint $table) {
            $table->increments('id_uml');
            $table->unsignedInteger('id_daerah');
            $table->string('nama_uml');
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('id_daerah')->references('id_daerah')->on('daerah');
        });

        Schema::create('petugas_uml', function (Blueprint $table) {
            $table->increments('id_petugas_uml');
            $table->unsignedInteger('id_uml');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('no_kontak');
            $table->string('alamat');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
    
            $table->foreign('id_uml')->references('id_uml')->on('uml');
        });

        Schema::create('gapoktan', function (Blueprint $table) {
            $table->increments('id_gapoktan');
            $table->unsignedInteger('id_komoditi');
            $table->unsignedInteger('id_petugas_uml');
            $table->string('nama_gapoktan');
            $table->integer('tahun_berdiri');
            $table->string('upah_tk');
            $table->string('jumlah_kt');
            $table->string('jumlah_anggota');
            $table->string('nama_ketua');
            $table->string('nama_sekretaris');
            $table->string('bendahara');
            $table->string('luas_lahan');
            $table->string('alamat');
            $table->string('status');
            $table->string('no_kontak');
            $table->string('deskripsi');
            $table->string('nama_pendamping');
            $table->timestamps();

            $table->foreign('id_komoditi')->references('id_komoditi')->on('komoditi');
            $table->foreign('id_petugas_uml')->references('id_petugas_uml')->on('petugas_uml');
        });

        Schema::create('alat', function (Blueprint $table) {
            $table->increments('id_alat');
            $table->unsignedInteger('id_gapoktan');
            $table->string('nama_alat');
            $table->string('jenis_alat');
            $table->string('asal_bantuan');
            $table->string('tahun_diperoleh');
            $table->string('kapasitas');
            $table->timestamps();

            $table->foreign('id_gapoktan')->references('id_gapoktan')->on('gapoktan')->onDelete('cascade');
        });

        Schema::create('pemasaran', function (Blueprint $table) {
            $table->increments('id_pemasaran');
            $table->unsignedInteger('id_gapoktan');
            $table->string('tujuan_pemasaran');
            $table->string('kerjasama');
            $table->string('jenis');
            $table->timestamps();

            $table->foreign('id_gapoktan')->references('id_gapoktan')->on('gapoktan')->onDelete('cascade');
        });


        Schema::create('produksi', function (Blueprint $table) {
            $table->increments('id_produksi');
            $table->unsignedInteger('id_gapoktan');
            $table->string('jenis_olahan');
            $table->float('jumlah_produksi',5,2);
            $table->integer('merk');
            $table->timestamps();

            $table->foreign('id_gapoktan')->references('id_gapoktan')->on('gapoktan')->onDelete('cascade');
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
