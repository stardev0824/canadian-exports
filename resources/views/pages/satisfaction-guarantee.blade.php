@extends("layouts.app")

@section("content")
    <div class="container padding-y">
        <h1 class="text-center text-blue mb-2">{{trans("satisfaction.header")}}</h1>
        <p style="line-height: 30px;">
            {{trans("satisfaction.text_1")}}
        </p><br>
        <p style="line-height: 30px;">
            {{trans("satisfaction.text_2")}}
        </p>
    </div>

@endsection
