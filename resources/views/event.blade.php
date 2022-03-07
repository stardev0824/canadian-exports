@extends("layouts.app")

@section("content")
    <div class="container padding-y">
        <h1 class="text-center text-blue mb-5">Event Detail</h1>
        <a href="#" class="text-dark">
            <h4 class="font-weight-bold mt-4">{{$event->title}}</h4>
        </a>
        <h6 class="font-weight-bold text-secondary mt-4">Start Date: : <span>{{$event->start_at}}</span></h6>
        <h6 class="font-weight-bold text-secondary mt-4">End Date : <span>{{$event->end_at}}</span></h6>
        <h6 class="font-weight-bold text-secondary mt-4">Venue : <span>{{$event->venue}}</span></h6>
        <h6 class="font-weight-bold text-secondary mt-4">City : <span>{{$event->city}}</span></h6>
        <h6 class="font-weight-bold text-secondary mt-4">Country : <span>{{$event->country}}</span></h6>
        @if(isset($event->url))
        <h6 class="font-weight-bold text-secondary mt-4">site : <span><a href="{{$event->url}}" target="_blank">{{$event->url}}</a></span></h6>
        @endif
        <p style="line-height: 30px" class="font-weight-bold mt-5">
            {{$event->description}}
        </p>

    </div>
@endsection
