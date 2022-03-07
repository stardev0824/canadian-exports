<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categgories=array(
            array("name_fr"=>"Agriculture, Aquaculture et élevage","name_en"=>"Agriculture, Aquaculture & Livestock"),
            array("name_fr"=>"Machines et machinerie","name_en"=>"Machines & Machinery"),
            array("name_fr"=>"Art, cadeaux, produits artisanaux et musique","name_en"=>"Art, Gifts, Crafts & Music"),
            array("name_fr"=>"Fabrication","name_en"=>"Manufacturing"),
            array("name_fr"=>"Industrie automobile et aviation","name_en"=>"Automotive & Aviation"),
            array("name_fr"=>"Marine","name_en"=>"Marine"),
            array("name_fr"=>"Services aux entreprises","name_en"=>"Business Services"),
            array("name_fr"=>"Marketing Et développement des affaires","name_en"=>"Marketing & Business Development"),
            array("name_fr"=>"Chimie et pharmacie","name_en"=>"Chemicals & Pharmaceuticals"),
            array("name_fr"=>"Vêtements, chaussures et textiles","name_en"=>"Clothing, Footwear & Textile"),
            array("name_fr"=>"Médias: Communication & publicité","name_en"=>"Media: Communication & Advertising"),
            array("name_fr"=>"Construction: publique et privée","name_en"=>"Construction: Public & Private"),
            array("name_fr"=>"Médical, laboratoire et scientifique","name_en"=>"Medical, Laboratory & Scientific"),
            array("name_fr"=>"Conseil","name_en"=>"Consulting"),
            array("name_fr"=>"Métallurgie et Métallurgie","name_en"=>"Metalworking & Metallurgy"),
            array("name_fr"=>"Biens de consommation","name_en"=>"Consumer Goods"),
            array("name_fr"=>"Extraction minière, exploitation en carrière, extraction de pétrole et de gaz","name_en"=>"Mining, Quarrying, & Oil & Gas Extraction"),
            array("name_fr"=>"Contrôle et automatisation","name_en"=>"Control & Automation"),
            array("name_fr"=>"Divers (Non classifié par ailleurs)","name_en"=>"Miscellaneous (Not Otherwise Classified)"),
            array("name_fr"=>"Défense et sécurité","name_en"=>"Defense & Security"),
            array("name_fr"=>"Matériel et fournitures de bureau","name_en"=>"Office Equipment and Supplies"),
            array("name_fr"=>"Electricité Et électronique","name_en"=>"Electrical & Electronics"),
            array("name_fr"=>"Pétrole et gaz","name_en"=>"Oil and Gas"),
            array("name_fr"=>"Soins personnels: santé, beauté et mode","name_en"=>"Personal Care: Health, Beauty & Fashion"),
            array("name_fr"=>"Technologies environnementales et vertes","name_en"=>"Environmental & Green Technologies"),
            array("name_fr"=>"Plastiques et caoutchouc","name_en"=>"Plastics & Rubber"),
            array("name_fr"=>"Finance et assurances","name_en"=>"Finance & Insurance"),
            array("name_fr"=>"Matériel de précision","name_en"=>"Precision Equipment"),
            array("name_fr"=>"Aliments, boissons et transformation des aliments","name_en"=>"Food, Beverages & Food Processing"),
            array("name_fr"=>"Travaux publics et construction","name_en"=>"Public Works & Construction"),
            array("name_fr"=>"Franchises","name_en"=>"Franchises"),
            array("name_fr"=>"Sécurité, sécurité, incendie & police","name_en"=>"Safety, Security, Fire & Police"),
            array("name_fr"=>"Mobilier: résidentiel et commercial","name_en"=>"Furniture: Residential & Commercial"),
            array("name_fr"=>"Science. Technologie. Innovation","name_en"=>"Science. Technology. Innovation"),
            array("name_fr"=>"Cadeaux et bijoux","name_en"=>"Gifts and Jewelry"),
            array("name_fr"=>"Sports et loisirs","name_en"=>"Sports and Recreation"),
            array("name_fr"=>"Soins de santé et assistance sociale","name_en"=>"Healthcare & Social Assistance"),
            array("name_fr"=>"Télécommunication","name_en"=>"Telecommunication"),
            array("name_fr"=>"Chauffage, ventilation et climatisation","name_en"=>"Heating, Ventilation and Air Conditioning"),
            array("name_fr"=>"Jouets et jeux","name_en"=>"Toys and Games"),
            array("name_fr"=>"Maison et jardin","name_en"=>"Home and Garden"),
            array("name_fr"=>"Associations professionnelles","name_en"=>"Trade Associations"),
            array("name_fr"=>"Industrie de l'accueil","name_en"=>"Hospitality Industry"),
            array("name_fr"=>"Salons professionnels et événements","name_en"=>"Trade Shows and Events"),
            array("name_fr"=>"Industrie","name_en"=>"Industrial"),
            array("name_fr"=>"Transports et entreposage","name_en"=>"Transportation and Warehousing"),
            array("name_fr"=>"Technologies de l'information","name_en"=>"Information Technology"),
            array("name_fr"=>"Voyages et tourisme","name_en"=>"Travel & Tourism"),
            array("name_fr"=>"Sciences de la vie et biotechnologies","name_en"=>"Life Science & Biotechnology"),
            array("name_fr"=>"Services publics","name_en"=>"Utilities"),
            array("name_fr"=>"Logistique, transport et entreposage","name_en"=>"Logistics, Transportation & Warehousing"),
            array("name_fr"=>"Déchets, Déchets, Eau  & Eaux usées","name_en"=>"Waste, Refuse, Water & Sewage"),
            array("name_fr"=>"Énergie","name_en"=>"Energy"),

        );

        foreach ($categgories as $categgory)
        {
            \App\Category::create([
                "name_en"=>$categgory["name_en"],
                "name_fr"=>$categgory["name_fr"],
                "slug" =>Str::slug($categgory["name_en"])
            ]);
        }
    }
}
