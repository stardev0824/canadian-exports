@component('mail::message')
# from {{$data["name"]}} email : {{$data['email']}}

{{ $data["item"] }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
