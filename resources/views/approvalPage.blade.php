<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_approval.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Панель</title>
</head>
<body onload="message_show()">
@include('components.header')
<div id="container">

    @foreach($materials as $material)
    <div class="sendApproved">
        <div class="left">
            <img class="material_img" src="{{ asset('storage/sent_materials/'.$material->path) }}" alt="">
            <video src="{{ asset('storage/sent_materials/'.$material->path) }}"></video>
            <div>
                <a href="{{ url('userpage/'.$material->users_id)}}"><img class="pfp" src="{{ asset('storage/profile_pics/'.App\Models\User::find($material->users_id)->path) }}" alt=""></a>
                <p><a class="user_name" href="{{ url('userpage/'.$material->users_id)}}">{{ App\Models\User::find($material->users_id)->nikname }}</a></p>
                <a class="btn download" href=" {{ url('approvaldownload/'.$material->id) }}">Скачать</a>
                <a class="btn delete" href=" {{ url('approvaldelete/'.$material->id) }}">Удалить</a>
            </div>
        </div>
        <form class="right" action="{{ route('approved') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="users_id" value="{{ $material->users_id }}" hidden>
                <input type="text" name="material_id" value="{{ $material->id }}" hidden>
                <label class="custom-file-upload input-file">
                    <input class="file_upload" type="file" name="material">
                    <span class="file_selected"></span>
                    <P>Материал</P>
                </label>
                @error('material')
                <p>{{ $message }}</p>
                @enderror
                <select name="dimentions" id="">
                    <option value="square">Квадратная</option>
                    <option value="vertical">Вертикальная</option>
                    <option value="horisontal">Горизонтальная</option>
                </select>
                <select name="type" id="">
                    <option value="photo">Фото</option>
                    <option value="video">Видео</option>
                    <option value="illustration">Иллюстрация</option>
                </select>
                <input type="text" name="tags" value="{{ $material->tags }}">
                @error('tags')
                <p>{{ $message }}</p>
                @enderror
                <button type="submit">Принять и выставить</button>
            </form>
            
        </div>
        
        
        @endforeach
        <div class="space"></div>
    </div>
    @include('components.footer')
<script>
        $('.file_upload').bind('change', function() { var fileName = ''; fileName = $(this).val().split('\\'); $(this).next().html(fileName[fileName.length - 1]); if($('#file_selected').html() == ''){$('#file_selected').html('Выберете файл')} $(this).next().next().hide();})
        $('video').on('error', function(e) {
            $(this).hide();
        });
        $('.material_img').on('error', function(e) {
            $(this).hide();
        });
    </script>

    </body>
    </html>