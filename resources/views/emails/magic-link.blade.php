@component('mail::message')
# ورود با رمز یکبار مصرف

برای ورود به سایت لطفا بر روی دکمه زیر کلیک کنید


@component('mail::button', ['url' => $link])
    ورود
@endcomponent

با تشکر<br>
{{ config('app.name') }}
@endcomponent
