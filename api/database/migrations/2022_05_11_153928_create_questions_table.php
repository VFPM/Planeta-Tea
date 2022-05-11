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
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('question_type_id');
            $table->foreign('question_type_id')
                ->references('id')->on('question_types')
                ->onDelete('cascade');

            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')
                ->references('id')->on('tests')
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
