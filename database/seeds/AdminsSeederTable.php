<?php

use Illuminate\Database\Seeder;

class AdminsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            "name"=>"Admin",
            "email"=>"ccaned@gmail.com",
            "password"=>bcrypt("password")
        ]);
    }
}
