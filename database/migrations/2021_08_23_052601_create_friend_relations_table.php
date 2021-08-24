<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_relations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user1_id')->nullable();
            $table->unsignedBigInteger('user2_id')->nullable();
            $table->enum('arefriend', [1,2])->default('1');

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
        Schema::dropIfExists('friend_relations');
    }
}
