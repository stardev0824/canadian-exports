<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count=1;

        $magzine_bussiness = array(
            array('id' => '2043','premium' => 'yes','cat_ids' => array(7,11),'name' => 'R&B LANGUAGE CONSULTING GROUP','short_description' => 'Connecting business cultures across the Americas','description' => '<p>Business culture and language consultancy between North and Latin America organizations</p>','keywords' => 'Translations, technical writing,copywriting, English-Spanish,','email' => 'erika@rblanguageconsulting.com','url' => 'www.rblanguageconsulting.com ','image' => '67615476.jpeg','unique_key' => '67615476','userid' => '2','video_url' => '','profile_image1' => '','profile_image2' => '','profile_image3' => '','profile_image4' => '','address' => '59 MCCreary Trail Bolton ON L7E 2C9 Canada','city' => '','state' => '','code' => '','phone' => '(905)857-6724','fax' => '','contact_person' => 'Erika P Roostna Director Translations and Creation','person_title' => '','country' => '','tollfree' => '','profile' => '' . "\0" . '','vdbox_hide' => '' . "\0" . '','title_hide' => '' . "\0" . '','logo_hide' => '' . "\0" . '','web_link' => '','link_created' => '0','personal_link' => '0','facebook_link' => 'rblanguageconsulting','twitter_link' => '@RB_LCG','youtube_link' => '','linkedin_link' => '','googleplus_link' => ''),//userid=264
            array('id' => '2104','premium' => 'yes','cat_ids' => array(5,10,16,20),'name' => 'Gatlin Global Trading Inc','short_description' => 'We are an experienced Exporter of Canadian made products in various industries and exporting around the world.','description' => 'We are an experienced Exporter of Canadian made products in various industries and exporting around the world.','keywords' => 'Translations, technical writing,copywriting','email' => 'ike@gatlinbc.com','url' => 'www.gatlinbc.com','image' => '','unique_key' => '123707819','userid' => '3','video_url' => '','profile_image1' => '','profile_image2' => '','profile_image3' => '','profile_image4' => '','address' => '55 Abbeydale Crescent, Winnipeg, R3Y 0B2, MB','city' => NULL,'state' => NULL,'code' => NULL,'phone' => '2049513905','fax' => '','contact_person' => 'Ike Nichola, Director','person_title' => NULL,'country' => NULL,'tollfree' => NULL,'profile' => '0','vdbox_hide' => '0','title_hide' => '0','logo_hide' => '0','web_link' => '','link_created' => '0','personal_link' => '0','facebook_link' => '','twitter_link' => '','youtube_link' => '','linkedin_link' => '','googleplus_link' => ''),//userid=331
            array('id' => '2165','premium' => 'yes','cat_ids' => array(1),'name' => 'Amad Testing','short_description' => 'testing the new registration process August 06, 2019','description' => 'testing the new registration process August 06, 2019','keywords' => 'Translations, technical writing,copywriting','email' => 'test@test.com','url' => 'www.amadtesting.com','image' => '','unique_key' => '80850016','userid' => '4','video_url' => '','profile_image1' => '','profile_image2' => '','profile_image3' => '','profile_image4' => '','address' => '1272 Saint Croix, Saint Laurent, QC, H4N 1Y6','city' => NULL,'state' => NULL,'code' => NULL,'phone' => '(514)245-1894','fax' => '','contact_person' => 'Amad Testing','person_title' => NULL,'country' => NULL,'tollfree' => NULL,'profile' => '0','vdbox_hide' => '0','title_hide' => '0','logo_hide' => '0','web_link' => '','personal_link' => '0','facebook_link' => '','twitter_link' => '','youtube_link' => '','linkedin_link' => '','googleplus_link' => ''),//userid=406
            array('id' => '2166','premium' => 'yes','cat_ids' => array(1),'name' => 'Ramziii','short_description' => 'Bfjdhdudjfhdjiwjdbfjdusbbdshejshdh','description' => 'Bfjdhdudjfhdjiwjdbfjdusbbdshejshdh','keywords' => 'Translations, technical writing,copywriting','email' => 'ramzi@email.com','url' => 'Hahah.com','image' => '','unique_key' => '150422164','userid' => '5','video_url' => '','profile_image1' => '','profile_image2' => '','profile_image3' => '','profile_image4' => '','address' => '5235 1re avenue','city' => NULL,'state' => NULL,'code' => NULL,'phone' => '4388882711','fax' => '','contact_person' => 'Ramzi','person_title' => NULL,'vdbox_hide' => '0','title_hide' => '0','logo_hide' => '0','web_link' => '','personal_link' => '0','facebook_link' => '','twitter_link' => '','youtube_link' => '','linkedin_link' => '','googleplus_link' => '')//userid= 408
        );

        foreach ($magzine_bussiness as $mb)
        {
            $profile_data=[
                "company_name"=>$mb["name"],
                "user_id"=>$mb["userid"],
                "company_email"=>$mb["email"],
                "address"=>$mb["address"],
                "site"=>$mb["url"],
                "phone"=>$mb["phone"],
                "short_description"=>$mb["short_description"],
                "description"=>$mb["description"],
                "tag_line"=>null,
                "key_word"=>$mb["keywords"],
            ];

            $media_data=[
                "profile_id"=>$count
            ];

            $social_media_data=[
                "profile_id"=>$count
            ];

            $profile=\App\Profile::create($profile_data);
            \App\Media::create($media_data);
            \App\SocialMedia::create($social_media_data);

            $categories= \App\Category::find($mb["cat_ids"]);
            $profile->categories()->attach($categories);

            $count++;
        }

    }
}
