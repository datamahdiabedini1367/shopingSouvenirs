@component('mail::message')
# User Registered

The body of your message.

- list1
- list2
- list3

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
