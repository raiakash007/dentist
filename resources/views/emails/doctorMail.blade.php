@component('mail::message')
# Introduction

The OTP is  {{ $details['otp'] }}.


Thanks,<br>
<!-- {{ config('app.name') }} -->
@endcomponent
