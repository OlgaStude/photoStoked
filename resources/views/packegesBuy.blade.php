<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_pocets.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Купить пакеты</title>
</head>

<body onload="message_show()">
    @include('components.header')
<div id="container">
    <div id="forms_container">
        <form action="{{ route('payment', 1) }}" method="get">
            <div class="packege">
                <h1>Малый пакет (500 Руб.)</h1>
                <p>Вы приобретаете возможность скачать 10 работ</p>
                <div class="cards">
                    <div class="center_card"></div>
                </div>
                <button type="submit">Приобрести</button>
            </div>
        </form>
        <form action="{{ route('payment', 2) }}" method="get">
            <div class="packege">
                <h1>Средний пакет (3000 Руб.)</h1>
                <p>Вы приобретаете возможность скачать 50 работ</p>
                <div class="cards">
                    <div class="first_card"></div>
                    <div class="center_card"></div>
                    <div class="last_card"></div>
                </div>
                <button type="submit">Приобрести</button>
            </div>
        </form>
        <form action="{{ route('payment', 3) }}" method="get">
            <div class="packege">
                <h1>Большой пакет (7000 Руб.)</h1>
                <p>Вы приобретаете возможность скачать 100 работ</p>
                <div class="cards">
                    <div class="first_card"></div>
                    <div class="first_middle_card"></div>
                    <div class="center_card"></div>
                    <div class="second_middle_card"></div>
                    <div class="last_card"></div>
                </div>
                <button type="submit">Приобрести</button>
            </div>     
        </form>
    </div>
</div>    
</body>

</html>