<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_show', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('poster');
            $table->string('picture');
            $table->text('description');
            $table->string('url_stream');
            $table->integer('movie_id');
            $table->integer('category_id');
            $table->integer('episode');
            $table->integer('season');
            $table->integer('total_episode');
            $table->integer('total_season');
            $table->integer('total_views');
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
        Schema::drop('tv_show');
    }
}
