<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_collections.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Коллекции</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <div id="container">
    <div id="persona">
    <img id="persona_pfp" src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt="">
        <div id="persona_info">
            <div id="top_fragment">
                <p>Это ваша личная страница, {{ Auth::user()->nikname }}</p>
                <a href="{{ route('userUpdatePage') }}"><img src="{{ asset('storage/img/notepad_icon.png') }}" alt=""></a>
            </div>
            <p>{{ Auth::user()->add_info }}</p>
        </div>
        <div id="persona_money">
            <p id="money_ammount">На вашем считу сейчас: {{ Auth::user()->money}}р, вы можете <a href="{{ route('payment', 4) }}">снять деньги</a></p>
            @if(isset($package[0]->purchases_left))
            <p>Покупок осталось: {{ $package[0]->purchases_left}}</p>
            @else
            <p>Покупок осталось: 0</p>
            @endif
        </div>
    </div>
        
    <div id="userpage_nav">
        <div id="userpage_nav_wrapper">
            <a href="{{ route('userpage.show', Auth::user()->id) }}">Мои работы</a>
            <a href="{{ route('userLikedPage') }}">Понравилось</a>
            <a href="{{ route('userFollows') }}">Избранные авторы</a>
            <a id="you_here" href="{{ route('collections') }}">Коллекции</a>
            <a href="{{ route('boughtPage') }}">Мои покупки</a>
        </div>
    </div>

<div id="add_to_collection">

    <input type="text" placeholder="Имя коллекции" id="collection_name">
    <button id="create_btn" onclick="create()">Создать</button>
</div>

    <div id="collections">
        @include('components.collections')
    </div>
    </div>
    @include('components.footer')

    <script>
    function create(name = $('#collection_name').val()) {
        $.ajax({
                url: '{{ route("makecollection") }}',
                method: 'GET',
                data: {
                    name: name
                },
                success: function(data) {
                    $('#collections').empty().append(data);
                    $('input').val('');
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError) {
                $("#loading").remove();
            })
    }
    </script>
</body>

</html>