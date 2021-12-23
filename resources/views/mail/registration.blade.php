@component('mail::message')
# BrighterLives Registration

Dear {{$user->first_name}},
Your #BrighterLives account have been created. Welcome to BrighterLives community!
<br>
 Email: {{$user->email}}
 password: the password you provided 

@component('mail::button', ['url' => '$url','color' => 'blue'])
LogIn
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
