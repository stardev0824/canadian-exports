<?php

use App\Buy;
use Illuminate\Database\Seeder;

class BuyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $items = array(array("category" =>"Business Services",
            "name"=>"Printing Work Provision",
            "country"=>"Denmark",
            "value" =>"",
            "dead_line"=>"Jan 23, 2018"
        ),
            array("category" =>"Business Services",
                "name"=>"Services for Analysis",
                "country"=>"France",
                "value" =>"",
                "dead_line"=>"July. 16, 2020"
            ),
            array("category" =>"Marketing & Business Development",
                "name"=>"Selection and Executive Assessment Services",
                "country"=>"Kingdom",
                "value" =>"$13000000",
                "dead_line"=>"Feb 01, 2018"
            ),
            array("category" =>"Marketing & Business Development",
                "name"=>"Quality Management Systems",
                "country"=>"United Kingdom",
                "value" =>"$162000",
                "dead_line"=>"March 3, 2018"
            ),
            array("category" =>"Other, Miscellaneous",
                "name"=>"Purchasing System for Education Transport Services",
                "country"=>"United Kingdom",
                "value" =>"$8500000",
                "dead_line"=>"April 13, 2019"
            ),
            array("category" =>"Other, Miscellaneous",
                "name"=>"Hazardous Substances",
                "country"=>"Germany",
                "value" =>"",
                "dead_line"=>"Feb. 23, 2017"
            ),
            array("category" =>"Office Equipments and Supplies",
                "name"=>"Copy Paper Supply",
                "country"=>"Germany",
                "value" =>"",
                "dead_line"=>"June 27, 2019"
            ),
            array("category" =>"Office Equipment and Supplies",
                "name"=>"Office Equipment and Supplies",
                "country"=>"France",
                "value" =>"$16200",
                "dead_line"=>"Oct 31, 2018"
            ),
            array("category" =>"Environmental. Green Technologies",
                "name"=>"Cleaning and environmental services",
                "country"=>"France",
                "value" =>"",
                "dead_line"=>"July 6, 2019"
            ),
            array("category" =>"Media: Communication & Advertising",
                "name"=>"Media Visits to Finland",
                "country"=>"Finland",
                "value" =>"",
                "dead_line"=>"Dec. 16, 2016"
            ),
            array("category" =>"Science. Technology. Innovation",
                "name"=>"Technology Facility Renovation and General Environment",
                "country"=>"Spain",
                "value" =>"$900000",
                "dead_line"=>"Dec 31, 2018"
            ),
            array("category" =>"Other, Miscellaneous",
                "name"=>"Monte Community Award",
                "country"=>"Spain",
                "value" =>"$121000",
                "dead_line"=>"August 13, 2018"
            ),
            array("category" =>"Healthcare",
                "name"=>"Management program offitness and aerobics for adults" ,
                "country"=>"Spain",
                "value" =>"$720000",
                "dead_line"=>"May 31, 2018"
            ),
            array("category" =>"Medical equipment orders",
                "name"=>"Medical, Lab and Scientific Products",
                "country"=>"",
                "value" =>"Lithuania",
                "dead_line"=>"June 03, 2018"
            ),
            array("category" =>"Medical, Lab and Scientific Products",
                "name"=>"Drug-drug orders",
                "country"=>"Lithuania",
                "value" =>"",
                "dead_line"=>"March 13, 2018"
            ),
            array("category" =>"Machines / Machinery",
                "name"=>"Mechanical workshop",
                "country"=>"Lithuania",
                "value" =>"",
                "dead_line"=>"Sept 03, 2019"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Construction, building and railway works",
                "country"=>"Finland",
                "value" =>"",
                "dead_line"=>"Dec 30, 2020"
            ),
            array("category" =>"Aerospace & Aviation",
                "name"=>"Space communications system",
                "country"=>"Germany",
                "value" =>"",
                "dead_line"=>"April18, 2017"
            ),
            array("category" =>"Construction",
                "name"=>"Construction of a new elementary school",
                "country"=>"Belgium",
                "value" =>"",
                "dead_line"=>"May 21, 2025"
            ),
            array("category" =>"Medical, Lab and Scientific Products",
                "name"=>"Maintenance and supply of reagents",
                "country"=>"Belgium",
                "value" =>"",
                "dead_line"=>"Aug 19, 2020"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Footpaths Re-laying",
                "country"=>"",
                "value" =>"Belgium",
                "dead_line"=>"August 14, 2018"
            ),
            array("category" =>"Water and Wastewater",
                "name"=>"Project for Water Rehabilitation",
                "country"=>"Tajikistan",
                "value" =>"",
                "dead_line"=>"Dec 9, 2016"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Public Transport ",
                "country"=>"Tajikistan",
                "value" =>"",
                "dead_line"=>"Oct 19, 2016"
            ),
            array("category" =>"Water and Wastewater",
                "name"=>"Solid Waste",
                "country"=>"Tajikistan",
                "value" =>"",
                "dead_line"=>"Oct. 2, 2016"
            ),
            array("category" =>"Other, Miscellaneous",
                "name"=>"Waste collection tools and emptying waste transport services",
                "country"=>"Estonia",
                "value" =>"",
                "dead_line"=>"Sept 01, 2021"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Road Transport Services",
                "country"=>"Estonia",
                "value" =>"",
                "dead_line"=>"Dec 01, 2016"
            ),
            array("category" =>"Other, Miscellaneous",
                "name"=>"Waste covered by organized waste collection and transportation service",
                "country"=>"Estonia",
                "value" =>"",
                "dead_line"=>"August 15, 2016"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Egyptian  Railways Restructuring Project",
                "country"=>"Egypt",
                "value" =>"$135000000",
                "dead_line"=>"Oct 26, 2016"
            ),
            array("category" =>"Other, Miscellaneous",
                "name"=>"Combined Cycle Gas-fired Power Plant",
                "country"=>"Egypt",
                "value" =>"",
                "dead_line"=>"June 4, 2016"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Public transport in Cairo",
                "country"=>"Egypt",
                "value" =>"$188000000",
                "dead_line"=>"June 11, 2016"
            ),
            array("category" =>"IT, Office Supplies",
                "name"=>"Office Machines & Automatic Data Processing Equipment",
                "country"=>"JAPAN",
                "value" =>"$300,00",
                "dead_line"=>"Aug. 27, 2016"
            ),
            array("category" =>"Pharmaceuticals",
                "name"=>"Delivery of drugs (Pharmaceuticals, medical chemicals and herbal products)",
                "country"=>"UZBEKISTAN",
                "value" =>"$170,000",
                "dead_line"=>"Not Provided"
            ),
            array("category" =>"Aerospace",
                "name"=>"Aircraft & Associated Equipment",
                "country"=>"JAPAN",
                "value" =>"March 03, 2016",
                "dead_line"=>"$4,800,000"
            ),
            array("category" =>"Construction",
                "name"=>"Construction Services",
                "country"=>"JAPAN",
                "value" =>"$80,000",
                "dead_line"=>"March 13, 2016"
            ),
            array("category" =>"Construction",
                "name"=>"Construction Services ; Architectual/Engineering & other Technical Services ; Building Cleaning Services",
                "country"=>"JAPAN",
                "value" =>"$2,600,000",
                "dead_line"=>"Feb. 16, 2016"
            ),
            array("category" =>"Machinery",
                "name"=>"Operation & Maintenance Machinery/Heavy Equipment and Light Vehicles",
                "country"=>"KYRGYZSTAN",
                "value" =>"$800,000",
                "dead_line"=>"May 14, 2016"
            ),

            array("category" =>"Safety & Security",
                "name"=>"Security services for the Delegation of the European Union to the Republic of Liberia",
                "country"=>"LIBERIA",
                "value" =>"$1,900,000",
                "dead_line"=>"April 13, 2016"
            ),
            array("category" =>"Medical Supplies",
                "name"=>"Medical Equipment (Joint Replacements) Per CPO Orders LT Electronic Catalog",
                "country"=>"LITHUANIA",
                "value" =>"Sep. 04, 2018",
                "dead_line"=>"$60,000"
            ),
            array("category" =>"IT, Office Supplies",
                "name"=>"Computer Equipment, Office Equipment, and Telecommunications Equipment Purchase",
                "country"=>"LITHUANIA",
                "value" =>"$120,000",
                "dead_line"=>"June 22, 2016"
            ),
            array("category" =>"Office Supplies",
                "name"=>"Framework Contract for the Printing and Copier Consumables Orders Over CPO",
                "country"=>"LITHUANIA",
                "value" =>"$80,000",
                "dead_line"=>"Sep. 25, 2017"
            ),
            array("category" =>"Medical",
                "name"=>"Medical Equipment Orders Over CPO Electronic Catalog",
                "country"=>"LITHUANIA",
                "value" =>"June 03, 2018",
                "dead_line"=>"$200,000"
            ),
            array("category" =>"Electrical / Electronics",
                "name"=>"Cisco Components for the City of Zurich",
                "country"=>"Switzerland",
                "value" =>"Aug. 21, 2018",
                "dead_line"=>"$200,000"
            ),
            array("category" =>"Chemicals",
                "name"=>"Acquisition of Three Vehicles Hydrocarbons and Chemical Defense (DHC)",
                "country"=>"Switzerland",
                "value" =>"Oct. 23, 2015",
                "dead_line"=>"$140,000"
            ),
            array("category" =>"Medical",
                "name"=>"Medical equipment (joint replacements)",
                "country"=>"LITHUANIA",
                "value" =>"$75,000",
                "dead_line"=>"Jan. 09, 2016"
            ),
            array("category" =>"Other, Misc.",
                "name"=>"Purchase EA",
                "country"=>"Russia",
                "value" =>"Sep. 30, 2016",
                "dead_line"=>"$20,000 "
            ),
            array("category" =>"Automotive",
                "name"=>"Purchase Gear",
                "country"=>"Russia",
                "value" =>"Oct. 21, 2016",
                "dead_line"=>"$80,000"
            ),
            array("category" =>"Science & Technology",
                "name"=>"Various scientific hardware and equipment delivery and installation in accordance with the technical specifications - 3rd stage",
                "country"=>"LATVIA",
                "value" =>"$40,000",
                "dead_line"=>"Not Provided"
            ),
            array("category" =>"Security, Safety",
                "name"=>"Video surveillance systems supply, construction and installation",
                "country"=>"LATVIA",
                "value" =>"$120,000",
                "dead_line"=>"Not Provided"
            ),
            array("category" =>"HVAC",
                "name"=>"District Heating Modernisation Project",
                "country"=>"UKRAINE",
                "value" =>"Sep. 04, 2016",
                "dead_line"=>"$1,200,000"
            ),
            array("category" =>"Water, Construction",
                "name"=>"Hydro Power Plants Rehabilitation Project",
                "country"=>"UKRAINE",
                "value" =>"$6,000,000",
                "dead_line"=>"June 11, 2016"
            ),
            array("category" =>"Mining",
                "name"=>"The Supply of Coal",
                "country"=>"Russia",
                "value" =>"$80,000",
                "dead_line"=>"Dec. 01, 2015"
            ),
            array("category" =>"Electrical, Construction",
                "name"=>"EBRD - 750 kV Rivne – Kyiv High Voltage Line Construction Project",
                "country"=>"UKRAINE",
                "value" =>"$3,200,000",
                "dead_line"=>"March 31, 2015"
            ),
            array("category" =>"Public Works & Construction",
                "name"=>"Implementation of Civil Works, GBDO No. 15 of the Pushkin District of St. Petersburg at the Address: St.-Petersburg, Pushkin, End of Street, Apartment 1, lit. And",
                "country"=>"Russia",
                "value" =>"$3,000,000",
                "dead_line"=>"Sep. 05, 2015"
            ),
            array("category" =>"Other, Misc.",
                "name"=>"Fuel Supply Automotive Plastic Card for the Needs MBOU Secondary School № 5 p.Tavrichanka the Nadezhda District",
                "country"=>"Russia",
                "value" =>"$30,000",
                "dead_line"=>"Dec. 25, 2015"
            ),
            array("category" =>"Marine",
                "name"=>"Seagoing Floating Docks",
                "country"=>"Romania",
                "value" =>"$45,000",
                "dead_line"=>"Apr. 07, 2015"
            )

);

        foreach ($items as $i )
        {
            Buy::create($i);
        }

    }
}
