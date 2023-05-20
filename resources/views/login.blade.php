<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
    <title>Log in</title>
</head>
<body>
<div id="container">
<a href="{{ route('mainpage') }}"><img id="logo" src="{{ asset('storage/img/logo.png') }}" alt=""></a>
    <form action="{{ route('userLogin') }}" method="post">
        <img src="{{ asset('storage/img/login_bg.png') }}" alt="">
            <div id="form_div">
            <h1>Вход</h1>
            @csrf
            <input type="text" name="email" placeholder="Введите адрес вашей почты">
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="Ваш пароль">
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
            @error('formError')
            <p class="error">{{ $message }}</p>
            @enderror
            <button type="submit">Log In</button>
            <p id="login">Ещё не с нами? Вы можете <a href="{{ route('register') }}">Зарегистроваться</a>!</p>
        </div>
    </form>
</div>
</body>
</html>