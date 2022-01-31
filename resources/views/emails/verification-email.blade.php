@component('mail::message')
# تایید ایمیل

 {{$name}} عزیز

برای تایید ایمیل خود بر روی دکمه زیر کلیک کن.

@component('mail::button', ['url' => $link])
تایید ایمیل
@endcomponent

با تشکر<br>
{{ config('app.name') }}
@endcomponent
