<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        img, video{
            height: 200px;
        }
        .sendApproved{
            float: right;
        }
    </style>
    <title>Document</title>
</head>
<body onload="message_show()">
@include('components.header')
    @foreach($materials as $material)
        <div class="sendApproved">
            <form action="{{ route('approved') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="users_id" value="{{ $material->users_id }}" hidden>
                <input type="text" name="material_id" value="{{ $material->id }}" hidden>
                <input type="file" name="material" id="">
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
                <textarea name="tags" id="" cols="30" rows="10">{{ $material->tags }}</textarea>
                @error('tags')
                    <p>{{ $message }}</p>
                @enderror
                <button type="submit">Принять и выставить</button>
            </form>
        </div>
        <img src="{{ asset('storage/sent_materials/'.$material->path) }}" alt="">
        <video src="{{ asset('storage/sent_materials/'.$material->path) }}"></video>
        <p>Отправил(а) <a href="{{ url('userpage/'.$material->users_id)}}">{{ App\Models\User::find($material->users_id)->nikname }}</a></p>
        <a href=" {{ url('approvaldownload/'.$material->id) }}">download</a>
        <a href=" {{ url('approvaldelete/'.$material->id) }}">delete</a>
        <hr>
    @endforeach
</body>
</html>