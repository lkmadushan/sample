<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('approver_id');
            $table->string('title');
            $table->text('content');
            $table->json('tags');
            $table->smallInteger('status');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('approver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
