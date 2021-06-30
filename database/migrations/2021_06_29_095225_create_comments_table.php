<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->integer('topic_id');
            $table->text('content');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('topic_id')->references('id')->on('topics');

            $table->index('is_published');
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
        Schema::dropIfExists('comments');
    }
}
