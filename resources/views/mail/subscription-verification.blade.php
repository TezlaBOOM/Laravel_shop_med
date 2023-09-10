<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    <p>Kliknij aby zwerfikwać maila</p>
    <a href="{{route('newsletter-verify', $subscriber->verified_token)}}">Kliknij</a>
</body>
</html>
