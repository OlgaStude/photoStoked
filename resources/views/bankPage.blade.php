<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <form action="{{ route('operation') }}" method="get">
        <input type="text" placeholder="номер карты" name="card">
        @error('card')
            <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="mm" name="month">
        @error('month')
            <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="yy" name="year">
        @error('year')
            <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="cvc" name="cvc">
        @error('cvc')
            <p>{{$message}}</p>
        @enderror
        <input type="text" hidden value="{{ $ammount }}" name='ammount'>
        <button type="submit">отправить</button>
        @if(session('success_message') !== null)
            {{ session('success_message') }}
            {{ Session::forget('success_message') }}
        @endif
    </form>
</body>
</html>