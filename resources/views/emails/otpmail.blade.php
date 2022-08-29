@component('mail::message')
# Welcome

Hello World

PIN: {{ $data }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>

@endcomponent