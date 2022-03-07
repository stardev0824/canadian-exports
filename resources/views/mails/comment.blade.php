@component('mail::message')
# From {{$data["name"]}} {{$data["email"]}}

#Comment
{{$data["comment"]}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
