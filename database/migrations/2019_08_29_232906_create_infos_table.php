<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("location")->nullable();
            $table->string("too_free")->nullable();
            $table->string("email")->nullable();
            $table->string("sales_department_email")->nullable();
            $table->string("employment_email")->nullable();
            $table->string("office_hours")->nullable();
            $table->string("phone")->nullable();
            $table->string("fax")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("linked_in")->nullable();
            $table->string("google")->nullable();
            $table->string("site")->nullable();
            $table->string("youtube")->nullable();
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
        Schema::dropIfExists('infos');
    }
}
