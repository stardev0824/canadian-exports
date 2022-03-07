<?php

use Illuminate\Database\Seeder;

class InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Info::create([
            "location"=>"1051 Blvd Decarie, P. O. Box: 53555 NORGATE, Montreal - Qc. Canada Postal Code: H4L 3M0.",
            "too_free"=>"1-877-333-3014 (Toll-Free within Canada and USA",
            "email"=>"info@canadianexports.org",
            "sales_department_email"=>"sales@canadianexports.org",
            "employment_email"=>"employment@canadianexports.org",
            "office_hours"=>"Monday - Friday 9:30 AM - 4:00 PM (EST)",
            "site"=>"www.canadianexports.org",
            "fax"=>"+1-514-333-4979",
            "facebook"=>"https://www.facebook.com/canadianexports",
            "twitter"=>"https://twitter.com/CanadianExports",
            "phone"=>"+1-514-557-7856 (From the rest of the world)",
            "linked_in"=>"https://www.linkedin.com/company/candianexports",
            "google"=>null,
            "youtube"=>"https://www.youtube.com/user/ahyimran/videos",
        ]);
    }
}
