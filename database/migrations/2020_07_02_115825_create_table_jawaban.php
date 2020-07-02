<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanyaan_id')->constrained('table_pertanyaan');
            $table->string('isi');
            $table->timestamp('tanggal_dibuat')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tanggal_diperbaruhi')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('is_correct')->default(false);
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
        Schema::dropIfExists('table_jawaban');
    }
}
