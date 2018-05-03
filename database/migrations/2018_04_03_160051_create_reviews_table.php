<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('approver_id');
            $table->unsignedInteger('media_id');
            $table->string('comment');
            $table->smallInteger('status');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('approver_id')->references('id')->on('users');
            $table->foreign('media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
