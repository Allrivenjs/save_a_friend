<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('name' );
            $table->string('slug' );

            $table->text('text' )->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->unsignedBigInteger('type_post_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('type_post_id')
                ->references('id')
                ->on('type_post')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
