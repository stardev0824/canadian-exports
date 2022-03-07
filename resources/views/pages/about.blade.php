@extends('layouts.app')
@section('style')
    <style>
        h1, h2, h3, h4, h5, h6, label, p {
            text-transform: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="container padding-y" style="padding-bottom: 0;">
        <h1 class="text-center text-blue pb-1" style="text-transform: none !important;">About us – What is Canadian
            Exports</h1>
        <p class="font-weight-normal text-justify" style="line-height: 30px;">
            Canadian Exports is Canada’s finest and most reliable Export Promotion Tool. Supported by an interactive
            website in 32 languages, and backed by more than 23 years of experience, it reaches more than 100,000
            importers and buyers in over 120 countries.<br>

            As a company, we possess a deep understanding of the import/export process and the challenges you will face
            along the way. To facilitate things on your end, we have agreements with many service providers that cover
            important operations such as shipping, forwarding, clearing, translation, travel and more.<br>

            We want to put you in touch with the best of Canadian companies for your needs. Before adding a company to
            our listings, we make sure that it can deliver what it promises. We only work with trustworthy partners.<br>

            Our services are tailored to your needs. We can recommend specific products, services or business partners,
            help you establish initial contact, facilitate negotiations, arrange business meetings and inform you of
            upcoming Trade Fairs, Business Delegations & Missions, among others.<br>

            To receive our Canadian Exports Magazine, The Export Promotion Magazine of Canada, free of charge, subscribe
            to our Info-Letter.<br>

            Canadian Exports respects your privacy. Our employees, associates and consultants will never ask for any
            confidential information, such as bank account numbers, credit card numbers or passwords.
        </p>
    </div>
    <br>


    <div class="container">
        <h1 class="text-center text-blue pb-1">Mission Statement</h1>
        <p class="font-weight-normal" style="line-height: 30px;">
            Our mission is to promote Canadian exports and help Canadian companies find buyers and distributors for
            their products and services.
            We are committed to:<br>
            • Making it easy for international importers to source their products and services from Canada.<br>
            • Opening new markets and exporting channels for Canadian exporters.
        </p>
    </div>
    <br>


    <div class="container">
        <h1 class="text-center text-blue pb-1">Vision Statement</h1>
        <p class="font-weight-normal" style="line-height: 30px;">
            To be the leading service provider for Canadian exporters and international importers, fostering the best
            conditions for them to connect and do business.
        </p>
    </div>
    <br>


    <div class="container">
        <h1 class="text-center text-blue pb-1">Frequently Asked Questions (FAQ)</h1>
        <p class="font-weight-normal mb-1" style="line-height: 30px;">
            Q1: What is Canadian Exports?<br>

            A1: Canadian Exports is the Export Promotion Magazine of Canada. We are a Canadian leader in global trade,
            as our e-Magazine and interactive website available in 32 languages allow you to find Canadian companies
            that fit your needs, allowing you to import high-quality products and services from Canada.
        </p>
        <p class="font-weight-normal mb-1" style="line-height: 30px;">
            Q2: How can I get hold of Canadian Exports Magazine?<br>
            A2: There are several ways to obtain Canadian Exports Magazine:.<br>
            • You can Contact us if you’d like us to send you a physical copy by mail.<br>
            • You can subscribe to our Info-Letter and we will send you an electronic copy (PDF) of every new issue of
            the magazine via email for free.<br>
            • You can download the most recent issue from our Home Page.
        </p>
        <p class="font-weight-normal mb-1" style="line-height: 30px;">
            Q3: What can you do for our company?<br>
            A3: Essentially, we act as matchmakers. We help Canadian exporters and international importers come together
            to do business. We offer a wide range of export-related services that cover most of the import/export
            process. We can recommend specific products, services or Canadian business partners, help you establish
            initial contact, facilitate negotiations, arrange business meetings and inform you of upcoming Trade Fairs,
            Business Delegations and so much more.
        </p>
        <p class="font-weight-normal mb-1" style="line-height: 30px;">
            Q4: How do we start using your services?<br>
            A4: To begin, select your Business Category (Industry Sector) from our directory. If the Business Profiles
            (ads) listed do not match your specific need, simply contact us with your inquiry. A consultant will be
            happy to help you find the Business Partner you are looking for.
        </p>
        <p class="font-weight-normal" style="line-height: 30px;">
            Q5: Why Canada?<br>
            A5: Canadian products and services have an excellent reputation worldwide for their high quality and
            competitive rates. Canadian business partners are trustworthy, reliable and can deliver the products and
            services you need on time.
        </p>
    </div>
    <br>
    @include("layouts.partial.related_program")
    <br>
    <div class="container">
        <h1 class="text-center text-blue pb-1">Tell Me More</h1>
        <p class="font-weight-normal text-justify" style="line-height: 30px;">
            “It’s a great big world out there, getting more and more connected every day. Chances are, there are
            countless companies around the globe ready to buy your products . . . if only they knew about you”.<br>
            But finding those buyers can be tricky. Do an Internet search for “buyers of [your product]” and you’ll get
            hundreds of thousands of listings. Where do you begin? And how many of those listings will be foreign
            importers ready to buy?<br>
            Even after finding them, would you know how to speak their language? And what about transportation costs,
            customs duties, and international paperwork, not to mention import restrictions posed by foreign
            governments?.<br>
            Luckily, we can help. Funded in part by the government, Canadian Exports matches up companies like yours
            with qualified, ready buyers around the world. But we don’t stop there. We provide guidance and support all
            the way through to a completed transaction. Here are the details:.<br>
            § Cut through the clutter. We actively search for interested importers through our partnerships with
            Chambers of Commerce, Business Councils, Commercial Sections and Import/Export Associations around the
            world.<br>
            § Get noticed. Every two months, our online and printed publication of Canadian Exporters reaches an
            estimated 75,000 foreign buyers. In addition, we continuously promote our clients to an ever-growing
            database of international importers. This kind of targeted promotion ensures that your company gets noticed
            by relevant, ready buyers.<br>
            § Gain from our experience. The two founders of Canadian Exports have experience in 14 countries, with
            nearly 20 years in international importing and exporting. Both immigrants to Canada themselves, they each
            speak multiple languages and understand the subtleties of a wide range of cultures. Along with their team of
            sales consultants, they bring to your company the know-how and connections it takes to sell your products
            abroad.<br>
            § Let us do the legwork. In some cases, we’re a value-added matchmaking and resource referral service. But
            in other cases, you may want more help than that. For example, if you need an international sales contract
            drawn up or someone to negotiate pricing, payment terms, or even your participation in Trade Fairs, Trade
            Missions and Business delegations … etc, we’re available to support you on a separate consulting basis.<br>
            § Save money. The value of our services is potentially limitless. And yet, thanks in part to support from
            the Canadian government, we are able to offer most of our services for less than the cost of an ad in your
            local newspaper. Compare that with the cost of attending just one trade show! Best of all, our fees are 100%
            tax deductible!
        </p>
        <p class="font-weight-bold mt-5">Want to hear even more, call 1-877-333-3014 to speak with one of our exports
            consultants.</p>
    </div>


@endsection
