<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("profile_id");
            $table->foreign("category_id")
                ->references("id")->on("categories")
                ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("profile_id")
                ->references("id")->on("profiles")
                ->onDelete("cascade")->onUpdate("cascade");
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
        Schema::table('category_profile',function (Blueprint $table){
            $table->dropForeign('category_profile_category_id_foreign');
        });
        Schema::table('category_profile',function (Blueprint $table){
            $table->dropForeign('category_profile_profile_id_foreign');
        });
        Schema::dropIfExists('category_profile');
    }
}
