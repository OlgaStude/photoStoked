<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_userpage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>{{ App\Models\User::find(collect(request()->segments())->last())->nikname }}</title>
</head>

<body onload="message_show()">
    @include('components.header')

<div id="container">

    @auth
    @if (collect(request()->segments())->last() == Auth::user()->id)
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
            <a id="you_here" href="{{ route('userpage.show', collect(request()->segments())->last()) }}">Мои работы</a>
            <a href="{{ route('userLikedPage') }}">Понравилось</a>
            <a href="{{ route('userFollows') }}">Избранные авторы</a>
            <a href="{{ route('collections') }}">Коллекции</a>
            <a href="{{ route('boughtPage') }}">Мои покупки</a>
        </div>
    </div>
         
            @else
    <div id="persona">
        <img id="persona_pfp" src="{{ asset('storage/profile_pics/'.App\Models\User::find(collect(request()->segments())->last())->path) }}" alt="">
        <div id="persona_info">
            <div id="top_fragment">
                <p>Это страница, {{ App\Models\User::find(collect(request()->segments())->last())->nikname }}</p>
            </div>
            <p>{{ App\Models\User::find(collect(request()->segments())->last())->add_info }}</p>
        </div>
        @if(App\Models\Subscriptions::where([
                ['users_id', '=', Auth::user()->id],
                ['followed_id', '=', collect(request()->segments())->last()],
                ])->exists())
                <button id="subscribe_btn" class="unsubscribe" onclick="subscribe('{{ collect(request()->segments())->last() }}')">Убрать из избранного</button>
                @else
                <button id="subscribe_btn" class="subscribe" onclick="subscribe('{{ collect(request()->segments())->last() }}')">Добавить в избранное</button>
                @endif
    </div>
            <div id="userpage_nav">
                </div>
                @endif
            
                
                @endauth
                @guest
                <div id="persona">
                    <img id="persona_pfp" src="{{ asset('storage/profile_pics/'.App\Models\User::find(collect(request()->segments())->last())->path) }}" alt="">
                    <div id="persona_info">
                        <div id="top_fragment">
                            <p>Это страница, {{ App\Models\User::find(collect(request()->segments())->last())->nikname }}</p>
                        </div>
                        <p>{{ App\Models\User::find(collect(request()->segments())->last())->add_info }}</p>
                    </div>
                </div>
                <div id="userpage_nav">
                </div>
                @endguest
                
                <div id="post_data">
                    
                    @include('components.data')
                </div>
            </div>
                
    @include('components.footer')
                
                
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