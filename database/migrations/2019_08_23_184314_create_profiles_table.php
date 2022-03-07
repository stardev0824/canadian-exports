<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id")->default(0);
            $table->string("company_name");
            $table->string("company_email");
            $table->text("address");
            $table->string("site");
            $table->string("phone");
            $table->string("fax")->nullable();
            $table->text("short_description");
            $table->text("description");
            $table->string("tag_line")->nullable();
            $table->text("key_word");

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
        Schema::dropIfExists('profiles');
    }
}
