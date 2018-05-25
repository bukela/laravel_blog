@component('mail::message')
# **{{ $user->name }}** Welcome to our site

Thanks for **signing** up. _Have a nice day_.

@component('mail::panel')
    Your signed up email is {{ $user->email }}
@endcomponent

@component('mail::button', ['url' => 'http://valele.test'])
View my dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
