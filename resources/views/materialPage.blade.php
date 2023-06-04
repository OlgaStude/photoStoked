<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_material.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Работа от {{$material[0]->nikname }}</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <div id="container">
        <div id="material_info">
            <div id="material_container">
                <div id="material_wrapper">
                    @if($material[0]->type == 'photo' ||$material[0]->type == 'illustration')
                    <img class="material" src="{{ asset('storage/approved_materials/'.$material[0]->material_path)}}" alt="">
                    @else
                    <video controls='true' class="material" src="{{ asset('storage/approved_materials/'.$material[0]->material_path)}}"
                    alt=""></video>
                    @endif
                </div>
            </div>
            <div id="info">
                <div id="info_top">
                    @if($material[0]->dimentions == 'square')
                    <p id="demention">Квадратная</p>
                    @elseif($material[0]->dimentions == 'horisontal')
                    <p id="demention">Горизонтальная</p>
                    @else
                    <p id="demention">вертикальная</p>
                    @endif
                    @if($material[0]->type == 'photo')
                    <p id="type">Фотография</p>
                    @elseif($material[0]->type == 'video')
                    <p id="type">Видео</p>
                    @else
                    <p id="type">Иллюстрация</p>
                    @endif
                </div>
                @auth
                <div id="info_bottom">
                    @if(App\Models\Approved_m::where([ ['users_id', '=' , Auth::user()->id],
                    ['id', '=', $material[0]->material_id],
                    ])->exists())
                    <a id="not_bought" href=" {{ url('boughtdownload/'.$material[0]->material_id) }}"><button id="buy_btn">Скачать</button></a>
                    <p>Это ваш собственный материал</p>
                    @elseif(App\Models\Bought_material::where([ ['users_id', '=' , Auth::user()->id],
                    ['approved_ms_id', '=', $material[0]->material_id],
                    ])->exists())
                    <a id="not_bought" href=" {{ url('boughtdownload/'.$material[0]->material_id) }}"><button id="buy_btn">Скачать</button></a>
                    <p>Вы уже приобрели этот материал</p>
                    @elseif($has_packeges)
                    <a id="not_bought" href=" {{ url('boughtdownload/'.$material[0]->material_id) }}"><button onclick="buy('{{$material[0]->material_id}}', '{{$material[0]->user_id}}')" id="buy_btn">Скачать</button></a>
                    <p id="buy_counter">У вас осталось {{ $pakages[0]->purchases_left}} скачиваний</p>
                    @else
                    <p>У вас пока нет пакетов.</p>
                    <p><a href="{{ route('buyingpage') }}">Приобретите пакет, для скачивания</a></p>
                    @endif
                    <p id="bought">Вы уже приобрели этот материал</p>
                </div>
                @endauth
            </div>
        </div>
        <div id="author_likes">
            <div id="user">
                <a href="{{ url('userpage/'.$material[0]->user_id) }}"><img src="{{ asset('storage/profile_pics/'.$material[0]->user_path) }}" alt="">
                <p>{{ $material[0]->nikname}}</p></a>
            </div>
            <div id="likes">
                @auth
                @if(App\Models\Like::where([ ['users_id', '=' , Auth::user()->id],
                ['approved_ms_id', '=', $material[0]->material_id],
                ])->exists())
                <div class="liked">
                    <img onclick="like('{{$material[0]->material_id}}', '{{ $material[0]->users_id }}', '{{ $material[0]->path }}', '{{ $material[0]->type }}')"
                    class="like_button" src="{{ asset('storage/img/heart_like.png') }}" alt="">
                </div>
                @else
                <div class="notliked">    
                    <img onclick="like('{{$material[0]->material_id}}', '{{ $material[0]->users_id }}', '{{ $material[0]->path }}', '{{ $material[0]->type }}')"
                    class="like_button" src="{{ asset('storage/img/heart_black.png') }}" alt="">
                </div>
                @endif
                @endauth
                @guest
                <div class="notliked">    
                    <img src="{{ asset('storage/img/heart_black.png') }}" alt="">
                </div>
                @endguest
                <p>{{ $material[0]->likes }}</p>
            </div>
        </div>
            
        
        
    </div>
    @include('components.footer')

    <script>
        function like(id, user_id, path, type) {
            $.ajax({
                    url: "{{ route('like') }}",
                    method: 'GET',
                    data: {
                        id: id,
                        user_id: user_id,
                        path: path,
                        type: type
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {})
        }
        $('body').on('click', '.like_button', function(e) {
    e.stopPropagation();
    e.stopImmediatePropagation();
    if ($(this).parent().hasClass('liked')) {
        let likes = $(this).parent().next().html();
        likes--;
        $(this).parent().next().html(likes);
        $(this).parent().removeClass('liked');
        $(this).parent().addClass('notliked');
        $(this).attr("src","{{ asset('storage/img/heart_black.png') }}")
    } else {
        let likes = $(this).parent().next().html();
        likes++;
        $(this).parent().next().html(likes);
        $(this).parent().removeClass('notliked');
        $(this).parent().addClass('liked');
        $(this).attr("src","{{ asset('storage/img/heart_like.png') }}")
    }
})


        function buy(material_id, user_id) {
            $.ajax({
                    url: "{{ route('buying') }}",
                    method: 'GET',
                    data: {
                        material_id: material_id,
                        user_id: user_id
                    },
                    success: function(data) {
                        $('#not_bought').hide();
                        $('#bought').show();
                        $('#buy_counter').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {})
        }
    </script>
</body>

</html>