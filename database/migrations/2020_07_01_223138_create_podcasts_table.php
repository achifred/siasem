<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            
            $table->text('description')->nullable();
            $table->string('audio');
            $table->bigInteger('author');
            $table->bigInteger('category_id');
            $table->boolean('ispublished')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('plays')->default(0);
            $table->string('cover_art')->nullable();
            $table->timestamps();
            $table->foreign('author')->references('id')->on('users');

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podcasts');
    }
}
