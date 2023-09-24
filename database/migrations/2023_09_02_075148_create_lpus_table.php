<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunaan_units', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembuatan');
            $table->string('driverDropdown');
            $table->string('unitDropdown');
            $table->time('jam_first');
            $table->time('jam_last');
            $table->string('km_first');
            $table->string('km_last');
            $table->string('tujuan_penggunaan');
            $table->boolean('remember')->default(false);
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
        Schema::dropIfExists('laporanpenggunaanunits');
    }
};
