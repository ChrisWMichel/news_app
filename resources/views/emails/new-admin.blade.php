@component('mail::message')
Hello {{$user->firstname}}, you have been registered as an administrator with our website.
To complete your registration, click the link below.


<h2><a href="{{route('verifyAdmin', $user->email_token)}}">Complete Registration</a> </h2>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
