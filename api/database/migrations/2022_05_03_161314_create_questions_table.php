<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('test_id');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('test_id')
            ->references('id')->on('test')
            ->onDelete('cascade'); 
            $table->foreign('type_id')
            ->references('id')->on('question_type')
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
        Schema::dropIfExists('questions');
    }
}
