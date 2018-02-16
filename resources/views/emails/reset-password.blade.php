@component('mail::message')
Hello {{$user->firstname}}, please click the link below to reset your password.


<h2><a href="{{route('verify', $user->email_token)}}">Reset Password</a> </h2>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
