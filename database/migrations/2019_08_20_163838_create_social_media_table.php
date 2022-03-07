<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("facebook")->nullable();
            $table->string("google")->nullable();
            $table->string("youtube")->nullable();
            $table->string("twitter")->nullable();
            $table->string("linked_in")->nullable();
            $table->boolean("for_site")->default(false);
            $table->unsignedBigInteger("profile_id");

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

        Schema::dropIfExists('social_media');
    }
}
