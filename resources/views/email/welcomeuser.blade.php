@component('mail::message')
# {{ __('email.Welcome') }}, {{$user['fname']}} !!

{{ __('email.WelcomeBody') }}

@component('mail::button', ['url' => config('app.url')])
{{ __('email.ClickHere') }}
@endcomponent

{{ __('email.Thanks') }},<br>
{{ config('app.name') }}
@endcomponent
