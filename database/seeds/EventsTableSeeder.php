<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tbl_tradeshows = array(
            array('id' => '1','title' =>'Estonian EXPO Center','start_date' => '2011-5-02','end_date' => '2016-5-24','venue' => 'Lennart Meri Tallinn Airport  Gate 3, Lennujaama tee 2','city' => 'Tallinn','country' => 'Estonia','short_desc' => 'Estonian EXPO Center is the world first permanent exhibition center promoting export and import in an international airport. No other location can provide better branding to high net worth individuals, business people and decision makers daily in one place.Estonian EXPO Center is much more than "dead" advertising space. The most unique part of it is that our exhibition promotion representatives manage to capture 10-20 minutes daily from most of the important CEO’s traveling through Tallinn airport. They all have some time to spare while waiting for their flight and they all find the exhibition interesting and leave their business card with us to be contacted by Estonian companies in their business fields!','url' => 'http://www.estonianexpocenter.com/','status' => 'p'),
            array('id' => '2','title' => 'Best International Exhibition Organization','start_date' => '2015-5-12','end_date' => '2015-5-14','venue' => 'Hong Kong International Exhibitions Center','city' => 'Hong Kong','country' => 'China','short_desc' => 'Hong Kong Best International Exhibition (Group) Co','url' => 'http://www.84t.cn/en/index.asp','status' => 'p'),
            array('id' => '4','title' => 'Thailand International Furniture Fair 2015','start_date' => '2015-5-11','end_date' => '2015-5-15','venue' => 'not found','city' => 'Bangkok','country' => 'Thailand','short_desc' => 'Furniture Décor & LifestyleEvent Name : Thailand International Furniture Fair 2015 (TIFF 2015)Duration : Trade: March 11 – 13, 2015 (10.00-18.00 hrs)Public: March 14 – 15, 2015 (10.00-21.00 hrs)Venue : IMPACT, Bangkok, ThailandIndustry : HOME & LIVINGOrganizer : Office of Fashion and Lifestyle Business Development, Department of International Trade Promotion, Ministry of CommerceTel : +66 (0) 2 507 8363, 507 8361, 507 8364Fax : +66 (0) 2 547 4281, 547 4266E-mail : tiff@ditp.go.thWebsite : www.thailandfurniturefair.com, www.thaitradefair.comSupporters: 1. Thai Furniture Industry Club, The Federation of Thai Industries 2. Thai Furniture Industries AssociationExhibit Profile: Local and overseas manufacturers/exportersFURNITURE - Bedroom Furniture, Children Furniture, Dining Tables & Chair, Casual Furniture (Outdoor/Garden/Summer/Rattan etc.), Living Room Furniture, Office Furniture, Upholstered Furniture, Local and overseas manufacturers','url' => 'http://www.thailandfurniturefair.com/','status' => 'p')
        );

        foreach ($tbl_tradeshows as $event)
        {
            Event::create([
                "title"=>$event["title"],
                "start_at"=>$event["start_date"],
                "end_at"=>$event["end_date"],
                "description"=>$event["short_desc"],
                "venue"=>$event["venue"],
                "city"=>$event["city"],
                "country"=>$event["country"],
                "url"=>$event["url"]
            ]);
        }
    }
}
