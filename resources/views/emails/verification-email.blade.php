@component('mail::message')
# Verify your email

Dear {{$name}}

The body of your message.

@component('mail::button', ['url' => $link])
verify your email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
