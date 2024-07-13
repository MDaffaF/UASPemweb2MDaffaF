<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sla', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('name'); // Menyesuaikan dengan relasi ke tabel users
            $table->date('tanggal');
            $table->string('daya_tx')->nullable(); // Harus diisi
            $table->string('keterangan_daya_tx')->nullable();
            $table->string('refleksi_tx')->nullable(); // Harus diisi
            $table->string('keterangan_refleksi_tx')->nullable();
            $table->string('cn_signal_ird')->nullable(); // Harus diisi
            $table->string('keterangan_cn_signal_ird')->nullable();
            $table->string('eb_no_ird')->nullable(); // Harus diisi
            $table->string('keterangan_eb_no_ird')->nullable();
            $table->enum('tegangan_rst', ['Normal', 'Abnormal'])->nullable();
            $table->string('keterangan_tegangan_rst')->nullable();
            $table->time('jam_siaran'); // Harus diisi
            $table->string('keterangan_jam_siaran')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sla');
    }
}
