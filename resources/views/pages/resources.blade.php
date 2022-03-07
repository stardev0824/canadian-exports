@extends('layouts.app')
@section('style')
    <style>
        h1, h2, h3, h4, h5, h6, label, p {
            text-transform: none !important;
        }
    </style>
@endsection
@section('content')

    <div class="container padding-y">
        <h1 class="text-center text-blue mb-2">Resources</h1>
        <p class="font-weight-bold" style="line-height: 30px;">
            These resources might come in handy when doing business with Canada<br>
            § This page is available only in English and French, the official languages of Canada, because it pertains to Canadian institutions<br>
            § Cette page est disponible uniquement en anglais et en français, les langues officielles du Canada, car celle-ci se rapporte aux institutions canadiennes
        </p>
    </div>


    <div class="container padding-y">
        <div class="row">



            <div class="col-lg-6">
                <table class="table">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Canadian Government Links</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="http://canada.gc.ca/">Canada government website</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="http://www.edc.ca/">Export Development Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="http://www.dfait-maeci.gc.ca/menu-e.asp">Department of Foreign Affairs</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="http://www.cbsc.org/">Canada business service centres</a></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Financial Institutions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="http://www.fitt.ca/"> Forum for international trade training</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="http://www.bmo.com/">Bank of Montreal</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="www.canadatrust.com/">Canada Trust Corporation</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="http://www.cibc.com/">Canadian Imperial Bank of Commerce</a></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><a href="http://www.royalbank.com/">Royal Bank Financial Group</a></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td><a href="http://www.scotiabank.ca/">Scotiabank Group</a></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td><a href="http://www.tdbank.ca/">TD Bank Financial Group</a></td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td><a href="http://www.worldbank.org/">The World Bank Group</a></td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td><a href="http://www.bnc.ca/index_e.html">National Bank of Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td><a href="http://www.bdc.ca/"> Business Development Bank of Canada</a></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Canada Sight Seeing</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="http://www.canada.com/">Canada.com</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="http://www.yellow.ca/">Yellow.ca</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="http://www.toronto.com/">Toronto.com</a></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Business Travel Information</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="http://www.xe.com/currencyconverter/">Currency Convertor</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="http://www.travelcity.com/">Travel City</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="http://www.aircanada.ca/home.html">Air Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="http://www.canoe.ca/TravelCanada/home.html">Travel Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><a href="http://www.yellow.ca/">Yellow.ca</a></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td><a href="http://www.canoe.ca/Weather/home.html">Weather</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>



            <div class="col-lg-6">
                <table class="table">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Other Directories</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="http://www.scottsinfo.com/">Scott's Directories</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="http://strategis.ic.gc.ca/">Strategis Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="http://www.yellow.ca/">Yellow.ca</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="http://www.ctidirectory.com/">Canadian Trade Index</a></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><a href="http://www.macraesbluebook.com/">MacRAE'S Blue Book</a></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-blue">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">General Interest</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="http://www.importers.ca/">Canadian Importers Association</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="http://www.cfib.ca/">Federation of Independent Business</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="http://embassy.goabroad.com/embassies-in/canada">Foreign Embassies in Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="http://www.tradenet.ca/">Tradenet Canada</a></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><a href="http://www.europages.com/">European Business Directory</a></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td><a href="http://www.doc.gov/">US Department of Commerce</a></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td><a href="http://www.canadapost.ca/">Canada Post</a></td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td><a href="http://www.usps.gov/">US Postal Service</a></td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td><a href="http://pacific.commerce.ubc.ca/trade/">Trade and Business Reference</a></td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td><a href="http://www.wtcmontreal.com/eng/formation/calendrier.html">Calendar of Export Related Activities</a></td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td><a href="http://ctexpo.com/">Computer Telephony Expo</a></td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td><a href="http://www.nationalpost.com/">National Post Online</a></td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td><a href="http://www.globeandmail.com/">The Globe and Mail</a></td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td><a href="http://canada411.sympatico.ca/">Canada411</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>





        </div>



    </div>
    <br>
@include("layouts.partial.related_program")

@endsection
