@component('mail::message')
# Reset account

Welcome {{$data['data']->name}}

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
    Click here to reset your password
@endcomponent

or <br>
copy this link
<a href="{{aurl('reset/password/'.$data['token'])}}">{{aurl('reset/password/'.$data['token'])}}</a><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
