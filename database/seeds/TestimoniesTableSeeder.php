<?php

use App\Category;
use App\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tests = array(
          array(
              "category"=>"Energy",
              "name"=>"Antoine Debre - Energy Management Corp","place"=>"Ontario - Canada","comment"=>"Canadian Exports has been of a tremendous help for us, a company with limited experience in exporting. Our business has increased thanks to Canadian Exports."
          ),
            array(
                "category"=>"Chemicals & Pharmaceuticals",
                "name"=>"Shayne Bishop - MAPCO Trading Company","place"=>"PEI - Canada","comment"=>"We’re a trading company, so we don’t manufacture. Thanks to Canadian Exports, we’ve found so many new clients from all over the world."
            ),
            array(
                "category"=>"Industrial",
                "name"=>"Oliver Ryan - Maurine Home Automation","place"=>"Quebec - Canada","comment"=>"We’d like to thank you for all the leads you’ve generated. Canadian Exports is a dream come true."
            ),
            array(
                "category"=>"Control & Automation",
                "name"=>"Mark Brown - Mazen Controls","place"=>"Nova Scotia - Canada","comment"=>"As a small business, Canadian Exports Magazine has been the best help we could have ever dreamed of. We will definitely continue advertising with them"
            ),
            array(
                "category"=>"Control & Automation",
                "name"=>"Robert Larsen - Rimouski Exporting Inc","place"=>"Ontario-Canada","comment"=>"I can’t believe we didn’t had an Export Promotion Tool before. We wasted so much time"
            ),
            array(
                "category"=>"Healthcare & Social Assistance",
                "name"=>"Nicolas Powell - Nicolas Import & Export Inc","place"=>"Alberta - Canada","comment"=>"Advertising with Canadian Exports Inc. has been the best decision we’ve made in the past decade. Such a small investment that has generated so many inquiries"
            ),
            array(
                "category"=>"Medical, Laboratory & Scientific",
                "name"=>"Monther Al Khoffash - Arabian Peninsula","place"=>"Doha - Qatar","comment"=>"Everything went smooth. Canadian businesses are very professional"
            ),
            array(
                "category"=>"Automotive & Aviation",
                "name"=>"Jack Tabba'a - Al Rostamani Group","place"=>"Dubai - United Arab Emirates","comment"=>"I expect Canadian exporting to grow and develop as a business because of companies like Canadian Exports."
            ),
            array(
                "category"=>"Automotive & Aviation",
                "name"=>"Raed Keswany - Taha Supplies","place"=>"Kuwait - Kuwait","comment"=>"We can't believe that all of Canadian Exports’ assistance was free-of-charge"
            ),
            array(
                "category"=>"Chemicals & Pharmaceuticals",
                "name"=>"Helen Tirana - Hamoud Chem","place"=>"Stockholm - Sweden","comment"=>"Of course we will do more business with Canada"
            ),
            array(
                "category"=>"Metalworking & Metallurgy",
                "name"=>"Raghunath Singh - Javed Trading Company","place"=>"Mumbai - India","comment"=>"We were very happy with the quality of the Canadian products we received. Canadian Exports has opened a new source of income for us"
            ),
            array(
                "category"=>"Furniture: Residential & Commercial",
                "name"=>"Yury terekhov - Yarky Tvet","place"=>"Volgagrad - Russia","comment"=>"We have made many purchases from the clients you identified to us"
            ),
            array(
                "category"=>"Industrial",
                "name"=>"Majed Abu Nawwar - Aberdeen Engineering LLC","place"=>"Jeddah - Kingdom of Saudi Arabia","comment"=>"Thank you for helping our delegation during their recent visit to Canada. They spoke very highly of Canadian Exports"
            ),
            array(
                "category"=>"Industrial",
                "name"=>"Fuad Ferro - Rashad Spare Parts Co","place"=>"Amman - Jordan","comment"=>"Thank you Canadian Exports. Canadians are the best"
            ),

            array(
                "category"=>"Medical, Laboratory & Scientific",
                "name"=>"Stephan Wayne - Shade General Trading","place"=>"Alberta-Canada","comment"=>"Canadian Exports goes the extra mile, using their personal contacts to help my business"

            ),
            array(
                "category"=>"Information Technology",
                "name"=>"John Nantais - Hill Technologies","place"=>"Alberta-Canada","comment"=>"What I like most is the service we get from Canadian Exports every time we call to ask about exporting. You are very professional."

            ),
            array(
                "category"=>"Business Services",
                "name"=>"Martin Shah - Jilany Commercial Services Inc","place"=>"Saskatchewan - Canada","comment"=>"Our ad in Canadian Exports Magazine generated inquiries from all over the world"

            ),
            array(
                "category"=>"Marine",
                "name"=>"Eddy Scott - Joudeh Trading Inc","place"=>"Alberta-Canada","comment"=>"Would we recommend Canadian Exports Magazine? Absolutely"
            ),
            array(
                "category"=>"Plastics & Rubber",
                "name"=>"Robert David - Zeith Plastics","place"=>"British Columbia - Canada","comment"=>"We had contacted a few advertising agencies and marketing consultants in some countries, but their rates were far beyond our budget. Having tried Canadian Exports Magazine for few months, it has exceeded our highest expectations"
            ),
            array(
                "category"=>"Construction: Public & Private",
                "name"=>"Jordan Rosenweig - Shaw Enterprises","place"=>"Quebec-Canada","comment"=>"Let me be honest here, when we advertised with you, I was skeptical. I mean, we had tried all kinds of advertising. Now, I can say I love it."
            ),
            array(
                "category"=>"Business Services",
                "name"=>"David Mizrahi - Costar Solutions","place"=>"Quebec-Canada","comment"=>"We never thought the return on our investment would be so high"
            ),


        );

        foreach ($tests as $test)
        {
            $category = DB::table("categories")->where("name_en","like",$test["category"])->get()->first();
            Testimonial::create([
                "name"=>$test["name"],
                "category_id"=>$category->id,
                "place"=>$test["place"],
                "comment"=>$test["comment"]
            ]);
        }
    }
}
