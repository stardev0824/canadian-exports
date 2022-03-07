@component('mail::message')
# From {{$data["name"]}}  email : {{$data['email']}}
# Company Name : {{$data["company"]}}

{{$data['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
