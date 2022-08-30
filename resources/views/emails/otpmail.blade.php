@component('mail::message')
# Welcome

EDGE

<h3>VERIFY YOUR LOGIN</h3>

The verification code is: {{ $data }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>

@endcomponent