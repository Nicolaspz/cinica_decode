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
        Schema::create('appointments', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->date('sheduled_date');
            $table->time('sheduled_time');
            $table->string('type');
            $table->string('descricao');

            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')->references('id')->on('users')->delete('cascade');

            $table->unsignedBigInteger('pacient_id');
            $table->foreign('pacient_id')->references('id')->on('users')->delete('cascade');

            $table->unsignedBigInteger('especialidade_id');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->delete('cascade');

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
        Schema::dropIfExists('appointments');
    }
};
