<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_register.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Registration</title>
</head>
<body>
<div id="container">

    <a href="{{ route('mainpage') }}"><img id="logo" src="{{ asset('storage/img/logo.png') }}" alt=""></a>
    <form action="{{ route('registration') }}" method="post" enctype="multipart/form-data">
        <img src="{{ asset('storage/img/Register_bg.png') }}" alt="">
        <div id="form_div">
            <h1>Регистрация</h1>
            @csrf
            <input type="text" name="nikname" placeholder="Придумайте псевдоним" value="{{ old('nikname') }}">
            @error('nikname')
            <p class="error">{{ $message }}</p>
            @enderror
            <input type="text" name="email" placeholder="Укажите вашу электронную почту" value="{{ old('email') }}">
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
            <input type="date" name="birthdate" value="{{ old('birthdate') }}">
            <input type="password" name="password" placeholder="Придумайте пароль">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
            <input type="password" name="password_check" placeholder="Повторите пароль">
            @error('password_check')
                <p class="error">{{ $message }}</p>
                @enderror
            <label class="custom-file-upload input-file">
            <input class="file_upload" type="file" name="pfp">
            <span id="file_selected"></span>
            <P>Выберите фото для профиля</P>
            </label>
            @error('pfp')
            <p class="error">{{ $message }}</p>
            @enderror
            <button type='submit'>Зарегистрироваться</button>
            <p id="login">Уже с нами? <a href="{{ route('login') }}">Войдете</a> в свой аккаунт</p>
        </div>
    </form>
</div>

    <script>
        $('.file_upload').bind('change', function() { var fileName = ''; fileName = $(this).val().split('\\'); $('#file_selected').html(fileName[fileName.length - 1]); if($('#file_selected').html() == ''){$('#file_selected').html('Выберете файл')} $('.custom-file-upload p').hide();})
        
    </script>
</body>
</html>