@component('mail::message')
# Introduction

Dear {{$user->first_name}},

Your BrighterLives Account have been created.
<br>
Email: {{$user->email}}
<br>
PassWord: a defauld password are set for You
<br>
Click to reset Your password.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
