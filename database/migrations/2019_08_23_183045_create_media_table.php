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
            $table->bigIncrements('id');
            $table->unsignedBigInteger("profile_id");
            $table->string("logo")->nullable();
            $table->text("video")->nullable();
            $table->string("image_1")->nullable();
            $table->string("image_2")->nullable();
            $table->string("image_3")->nullable();
            $table->string("image_4")->nullable();

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
        Schema::dropIfExists('media');
    }
}
