<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset - Password</title>
</head>
<body>
    @component('mail::message')
# Password Reset Request

Hello,

We received a request to reset your password. If you didn't make the request, you can ignore this email.

Otherwise, click the button below to reset your password:

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

This link will expire in 60 minutes.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

</body>
</html>
