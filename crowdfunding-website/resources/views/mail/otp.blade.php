<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP Code</title>
</head>

<body>
    <p>Halo {{ $name }}, berikut adalah kode OTP Anda:</p>

    <h1>{{ $otp }}</h1>

    <p>Anda dapat melakukan verifikasi email dengan menekan tombol berikut.</p>

    <form action="http://127.0.0.1:8000/api/auth/verification" method="POST">
        <input type="text" name="otp" hidden value="{{ $otp }}">
        <button type="submit">Verifikasi Email</button>
    </form>
</body>

</html>
