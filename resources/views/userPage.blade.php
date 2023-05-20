<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <style>
        img {
            width: 100px;
        }

        .material {
            width: 400px;

        }

        #loading {
            position: fixed;
            bottom: 10px;
            left: 30px;

            background-color: yellow;
        }

        .liked {
            background-color: red;
        }

        .notliked {
            background-color: grey;
        }

        #footer_div {
            height: 30px;
        }

        .subscribe {
            background-color: red;
        }
    </style>
    <title>Document</title>
</head>

<body onload="message_show()">
    @include('components.header')
    @auth
    @if (collect(request()->segments())->last() == Auth::user()->id)
    <p>Это ваша личная страница, {{ Auth::user()->nikname }}</p>
    <img src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt="">
    <p>{{ Auth::user()->add_info }}</p>

    <div id="user_page_pages">
        <a href="{{ route('userpage.show', collect(request()->segments())->last()) }}">Мои материалы</a>
        <a href="{{ route('userUpdatePage') }}">Редактировать</a>
        <a href="{{ route('userLikedPage') }}">Вам понравилось</a>
        <a href="{{ route('userFollows') }}">Избранные авторы</a>
        <a href="{{ route('collections') }}">Коллекции</a>
        <a href="{{ route('boughtPage') }}">Ваши покупки</a>
    </div>

    <form method="get" action="{{ route('payment', 4) }}" id="money_status">
        <p id="money_ammount">На вашем считу: {{ Auth::user()->money}}</p> <button type="submit">Обналичить</button>
        @if(isset($package[0]->purchases_left))
        <p>Покупок осталось: {{ $package[0]->purchases_left}}</p>
        @else
        <p>Покупок осталось: 0</p>
        @endif
    </а>
    <hr>


    @else
    <p>Это страница, {{ App\Models\User::find(collect(request()->segments())->last())->nikname }}</p>
    <img src="{{ asset('storage/profile_pics/'.App\Models\User::find(collect(request()->segments())->last())->path) }}" alt="">
    @if(App\Models\Subscriptions::where([
    ['users_id', '=', Auth::user()->id],
    ['followed_id', '=', collect(request()->segments())->last()],
    ])->exists())
    <button id="subscribe_btn" class="unsubscribe" onclick="subscribe('{{ collect(request()->segments())->last() }}')">Убрать из избранного</button>
    @else
    <button id="subscribe_btn" class="subscribe" onclick="subscribe('{{ collect(request()->segments())->last() }}')">Добавить в избранное</button>
    @endif
    <p>{{ App\Models\User::find(collect(request()->segments())->last())->add_info }}</p>
    <hr>

    @endif

    @endauth
    @guest
    <p>Это страница, {{ App\Models\User::find(collect(request()->segments())->last())->nikname }}</p>
    <img src="{{ asset('storage/profile_pics/'.App\Models\User::find(collect(request()->segments())->last())->path) }}" alt="">
    <p>{{ App\Models\User::find(collect(request()->segments())->last())->add_info }}</p>
    @endguest

    <div id="post_data">

        @include('components.data')
    </div>

    <div id="footer_div"></div>


    <script>
        function loadMoreData(id) {
            $.ajax({
                    url: "{{ route('userpage.show', collect(request()->segments())->last()) }}",
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#loading").remove();
                        $("#last_id").remove();

                        console.log(data);

                        $("#post_data").append(data);
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    $("#loading").remove();

                    console.log(throwError);
                })
        }
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                $("#loading").show();
                let id = $("#last_id").val();
                console.log(id);
                loadMoreData(id);
            }
        });


        function subscribe(followed_id) {
            $.ajax({
                    url: "{{ route('follow') }}",
                    method: 'GET',
                    data: {
                        followed_id: followed_id
                    },
                    success: function(data) {
                        console.log(data);
                        if ($('#subscribe_btn').hasClass('subscribe')) {
                            $('#subscribe_btn').removeClass('subscribe').addClass('unsubscribe').html(
                                'Убрать из избранного');
                        } else {
                            $('#subscribe_btn').addClass('subscribe').removeClass('unsubscribe').html(
                                'Добавить в избранное');
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {

                    console.log(throwError);
                })
        }

        function drain_money(){
            $.ajax({
                    url: "{{ route('moneyDrain') }}",
                    method: 'GET',
                    data: {
                    },
                    success: function(data) {
                        $('#money_ammount').empty().html('На вашем считу: '+data)
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {

                    console.log(throwError);
                })
        }
    </script>
</body>

</html>