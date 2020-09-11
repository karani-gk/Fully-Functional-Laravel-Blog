<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_title', 200);
            $table->string('read_duration', 20);
            $table->string('main_image', 200);
            $table->bigInteger('user_id', false, true)->unsigned()->index();
            $table->bigInteger('category_id', false, true)->unsigned()->index();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name', 100);
            $table->string('email', 100);
            $table->string('phone', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->text('comment');
            $table->bigInteger('post_id', false, true)->unsigned()->index();
            $table->foreign('post_id')
              ->references('id')
              ->on('posts')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('posts_body', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->bigInteger('post_id', false, true)->unsigned()->index();
            $table->foreign('post_id')
              ->references('id')
              ->on('posts')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('post_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image', 100);
            $table->bigInteger('post_id', false, true)->unsigned()->index();
            $table->foreign('post_id')
              ->references('id')
              ->on('posts')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('newsletter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 100);
            $table->string('full_name', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category', 100);
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
      Schema::dropIfExists('categories');
      Schema::dropIfExists('newsletter');
      Schema::dropIfExists('post_images');
      Schema::dropIfExists('posts_body');
      Schema::dropIfExists('comments');
      Schema::dropIfExists('posts');
    }
}
