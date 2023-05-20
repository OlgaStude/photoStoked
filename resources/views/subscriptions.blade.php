<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    img {
        width: 100px;
    }
    </style>
    <title>Подписки</title>
</head>

<body onload="message_show()">
    @include('components.header')
    @foreach($users as $user)
    <img src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
    <p><a href="{{ route('userpage.show', $user->id) }}">{{$user->nikname}}</a></p>
    @endforeach
</body>

</html>