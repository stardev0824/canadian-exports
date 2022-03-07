<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("place");
            $table->text("comment");
            $table->bigInteger("category_id")->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('testimonials',function (Blueprint $table){
            $table->dropForeign('testimonials_category_id_foreign');
        });
        Schema::dropIfExists('testimonials');
    }
}
