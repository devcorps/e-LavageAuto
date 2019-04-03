<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facture');
            $table->unsignedBigInteger('vehicule_id');
            $table->unsignedBigInteger('lavage_id');
            $table->integer('montant');
            $table->time('heureArrive');
            $table->time('heureDepart');
            $table->uuid('user_id');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->foreign('lavage_id')->references('id')->on('lavages')->onDelete('cascade');
            $table->foreign('user_id')->references('signature')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('passages');
    }
}
