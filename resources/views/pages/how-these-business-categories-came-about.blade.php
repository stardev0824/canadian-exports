@extends('layouts.app')

@section('content')
    <div class="container padding-y">
        <h1 class="text-center text-blue pb-2">How these Business Categories (Industry Sectors) came about</h1>
        <p class="font-weight-normal text-justify" style="line-height: 30px;">
            Industries on Canadian Exports website are classified according to the North American Industry Classification System (NAICS) Canada of 2007 and 2012, which has superseded the 1980 Standard Industrial Classification (SIC).<br><br>
            Its hierarchical structure is composed of sectors (two-digit code), subsectors (three-digit code), industry groups (four-digit code), and industries (five-digit code). For example, the Industry Sector (Agriculture, forestry, fishing and hunting) has five (5) sub-sectors, nineteen (19) Industry groups, and forty one (41) Industries. These are broadly comparable for all three North American Free Trade Agreement (NAFTA) countries; United States, Canada and Mexico. Nonetheless, there are a number of important exceptions; a country may choose to breakdown industries (five-digit code) into national industries (six-digit code) in order to capture additional detail. As the name indicates, national industries are unique to each country and cross-comparisons generally do not apply.
        </p>
        <p class="font-weight-normal text-justify mt-2" style="line-height: 30px;">
            Canadian Exports targets the entire global market and not just NAFTA, and recognizes the fact that other countries follow different classifications systems. With that in mind, we did the following changes:<br>
            1- We posted both sectors and subsectors as (Business Categories).<br>
            2- Sometimes, we slightly renamed some of the subsectors and/or moved some of them between the main sectors.<br>
            3- Other times, we used terminology used in other countries’ classification systems.
        </p>
        <p class="font-weight-normal text-justify mt-2" style="line-height: 30px;">
            Our goal is to simplify the communication process to ensure that exporters and importers speak the same language. We hope this does not cause confusion, and hold ourselves available to make any clarifications when necessary.<br>
            We especially apologize for some sectors that might look redundant; such as (Manufacturing) vs. (Industrial), or (Chemicals) that may include contents of other sectors like Agriculture, Energy, and so on.
        </p>
        <p class="text-right font-weight-bold mt-2">Canadian Exports Team</p>
    </div>
{{--	@include("layouts.partial.ads_banner")	--}}
	@include("layouts.partial.related_program")





@endsection
