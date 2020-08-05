@component('mail::message')
# Thank you for registering!


Check out my linkedIn
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
