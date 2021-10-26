<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoutenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
            $table->bigInteger('president_id')->unsigned()->index()->nullable();
            $table->foreign('president_id')->references('id')->on('juries')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('examinateur_id')->unsigned()->index()->nullable();
            $table->foreign('examinateur_id')->references('id')->on('juries')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('invite_id')->unsigned()->index()->nullable();
            $table->foreign('invite_id')->references('id')->on('juries')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('dateDefense');
            $table->boolean('validate')->nullable();
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
        Schema::dropIfExists('soutenances');
    }
}
