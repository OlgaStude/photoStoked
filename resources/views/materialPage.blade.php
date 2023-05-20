<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <style>
        #user img {
            width: 100px;
        }

        .liked {
            background-color: red;
        }

        .notliked {
            background-color: grey;
        }

        #bought {
            display: none;
        }
    </style>
    <title>Работа от {{$material[0]->nikname }}</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <div id="container">
        <div id="material">
            @if($material[0]->type == 'photo' ||$material[0]->type == 'illustration')
                <img class="material" src="{{ asset('storage/approved_materials/'.$material[0]->material_path)}}" alt="">
            @else
                <video controls='true' class="material" src="{{ asset('storage/approved_materials/'.$material[0]->material_path)}}"
                alt=""></video>
            @endif
            @auth
            @if(App\Models\Like::where([ ['users_id', '=' , Auth::user()->id],
            ['approved_ms_id', '=', $material[0]->material_id],
            ])->exists())
            <button onclick="like('{{$material[0]->material_id}}', '{{ $material[0]->user_id }}', '{{ $material[0]->material_path }}', '{{ $material[0]->type }}')" class="like_button liked">Понравилось</button>
            @else
            <button onclick="like('{{$material[0]->material_id}}', '{{ $material[0]->user_id }}', '{{ $material[0]->material_path }}', '{{ $material[0]->type }}')" class="like_button notliked">Понравилось</button>
            @endif
            @endauth
            <p>{{ $material[0]->likes }}</p>
            <p>{{ $material[0]->type }}</p>
            <p>{{ $material[0]->dimentions }}</p>
        </div>
        @auth
        <div id="buy_container">
            @if(App\Models\Bought_material::where([ ['users_id', '=' , Auth::user()->id],
            ['approved_ms_id', '=', $material[0]->material_id],
            ])->exists())
            <p>Вы уже приобрели этот материал</p>
            @elseif($has_packeges)
            <a id="not_bought" href=" {{ url('boughtdownload/'.$material[0]->material_id) }}"><button onclick="buy('{{$material[0]->material_id}}', '{{$material[0]->user_id}}')" id="buy_btn">Скачать</button></a>
            <p id="buy_counter">У вас осталось {{ $pakages[0]->purchases_left}} скачиваний</p>
            @else
            <p>У вас пока нет пакетов. <a href="#">Приобретите пакет, для скачивания</a></p>
            @endif
            <p id="bought">Вы уже приобрели этот материал</p>
        </div>
        @endauth
        <div id="user">
            <p><a href="{{ url('userpage/'.$material[0]->user_id) }}">{{ $material[0]->nikname}}</a></p>
            <img src="{{ asset('storage/profile_pics/'.$material[0]->user_path) }}" alt="">
        </div>
    </div>

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
            if ($(this).hasClass('liked')) {
                let likes = $(this).next().html();
                likes--;
                $(this).next().html(likes);
                $(this).removeClass('liked');
                $(this).addClass('notliked');
            } else {
                let likes = $(this).next().html();
                likes++;
                $(this).next().html(likes);
                $(this).removeClass('notliked');
                $(this).addClass('liked');
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