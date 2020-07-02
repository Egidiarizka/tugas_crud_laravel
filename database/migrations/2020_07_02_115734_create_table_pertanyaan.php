<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePertanyaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('isi');
            $table->timestamp('tanggal_dibuat')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tanggal_diperbaruhi')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('vote')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pertanyaan');
    }
}
