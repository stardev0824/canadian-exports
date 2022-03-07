<?php

use App\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
//         $this->call(CategoriesTableSeeder::class);
//         $this->call(ProfilesTableSeeder::class);
//        $this->call(InfosTableSeeder::class);
//        $this->call(AdminsSeederTable::class);
//        $this->call(EventsTableSeeder::class);
//        $this->call(TestimoniesTableSeeder::class);
//        $this->call(BuyTableSeeder::class);
    }
}
