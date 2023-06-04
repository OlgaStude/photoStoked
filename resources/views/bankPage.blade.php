<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_buying.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Продажа</title>
</head>
<body onload="message_show()">
@include('components.header')
<div id="container">

    <h1 id="tittle">{{$title}}</h1>
    <form action="{{ route('operation') }}" method="get">
        <select name="" id="">
            <option value="">Сбербанк</option>
            <option value="">ГазПром Банк</option>
            <option value="">Российский Банк</option>
            <option value=""></option>
        </select>
        <div id="second_row">

            <input id="card" type="text" placeholder="Номер карты" name="card">
            <input id="month" type="text" placeholder="MM" name="month">
            <span id="slash">/</span>
            <input id="year" type="text" placeholder="YY" name="year">
            @error('card')
            <p class="error card">{{$message}}</p>
            @enderror
        </div>
        <div id="last_row">
            <input id="name" type="text" placeholder="Имя на карте" name="name">
            @error('name')
            <p class="error name">{{$message}}</p>
            @enderror
            <div id="text">
                <span>Три цифры на обороте</span>
            </div>
            <input id="cvc" type="text" placeholder="CVC" name="cvc">
            @error('cvc')
            <p class="error cvc">{{$message}}</p>
            @enderror
        </div>
        <input type="text" hidden value="{{ $ammount }}" name='ammount'>
        <button type="submit">отправить</button>
    </form>
    @if(session('success_message') !== null)
    <p class="sucsess">{{ session('success_message') }}</p>
    {{ Session::forget('success_message') }}
    @endif
</div>
@include('components.footer')

</body>
</html>