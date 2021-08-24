<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultorios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('Working_open')->nullable();
            $table->string('Working_close')->nullable();
            $table->string('Working_hours_total')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('profile_cover_photo_path', 2048)->nullable();
            //$table->unsignedBigInteger('consultorio')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();

            $table->foreign('location_id')
                ->references('id')
                ->on('location')
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
        Schema::dropIfExists('consultorios');
    }
}
