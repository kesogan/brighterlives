@component('mail::message')
# Introduction

Y'ello You have receved new Donation from {{$donor->name}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
