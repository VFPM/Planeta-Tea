<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_answer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_contact_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->string('answer');
            $table->timestamps();

            $table->foreign('test_contact_id')
            ->references('id')->on('test_contact')
            ->onDelete('cascade');
            $table->foreign('question_id')
            ->references('id')->on('questions')
            ->onDelete('cascade');
            $table->foreign('answer_id')
            ->references('id')->on('answers')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_answer');
    }
}
