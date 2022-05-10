<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('platform_description');
            $table->timestamp('news_date');
            $table->string('link');
            $table->string('cost');
            $table->boolean('active')->default(1);
            $table->unsignedBigInteger('type_news_id');
            $table->unsignedBigInteger('mode_id');
            $table->unsignedBigInteger('platform_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('type_news_id')
                ->references('id')->on('type_news')
                ->onDelete('cascade');
            $table->foreign('mode_id')
                ->references('id')->on('mode')
                ->onDelete('cascade');
            $table->foreign('platform_id')
                ->references('id')->on('platform')
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
        Schema::dropIfExists('news');
    }
}
