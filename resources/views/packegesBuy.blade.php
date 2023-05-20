<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Купить пакеты</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <form action="{{ route('payment', 1) }}" method="get">
        <div class="packege">
            <h1>Малый пакет(10)</h1>
            <button type="submit">Купить</button>
        </div>
    </form>
    <form action="{{ route('payment', 2) }}" method="get">
        <div class="packege">
            <h1>Средний пакет(50)</h1>
            <button type="submit">Купить</button>
        </div>
    </form>
    <form action="{{ route('payment', 3) }}" method="get">
        <div class="packege">
            <h1>Большой пакет(100)</h1>
            <button type="submit">Купить</button>
        </div>
    </form>
</body>

</html>