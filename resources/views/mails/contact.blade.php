@component('mail::message')
# Contact Mail
## From {{$data["name"]." ".$data["email"]}}
{{$data["message"]}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
