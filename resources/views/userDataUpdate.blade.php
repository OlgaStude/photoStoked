<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_update.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Редактирование данных</title>
</head>
<body  onload="message_show()">

@include('components.header')
<div id="container">
    <div id="top_text">
        <a href="{{ url('userpage/'.Auth::user()->id) }}"><img id="go_back_arrow" src="{{ asset('storage/img/go_back_arrow.png') }}" alt=""><p id="go_bak_text">Назад на страницу</p></a>
    </div>
    <form action="{{ route('userUpdateAction', collect(request()->segments())->last()) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div id="form_left">
            <input type="text" name="nikname" placeholder="изменить ваше прозвище" value="{{ Auth::user()->nikname }}">
            @error('nikname')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" name="email" placeholder="изменить почту" value="{{ Auth::user()->email }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <input type="date" name="birthdate" value="{{ Auth::user()->birthdate }}">
            <textarea name="add_info" id="" cols="30" placeholder="расскажите немного о себе" rows="10"  value="">{{ Auth::user()->add_info }}</textarea>
            @error('add_info')
                <p>{{ $message }}</p>
            @enderror
        <button type="submit">Сохранить изменения</button>
        </div>
        <div id="form_right">
            <label class="custom-file-upload input-file">
                <input class="file_upload" type="file" name="pfp">
                <span id="file_selected"></span>
                <P>Выберите фото для профиля</P>
            </label>
            @error('file')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <input type="text" hidden value="{{ Auth::user()->id }}" name="id">
        
        
    </form>
</div>
@include('components.footer')
<script>
        $('.file_upload').bind('change', function() { var fileName = ''; fileName = $(this).val().split('\\'); $('#file_selected').html(fileName[fileName.length - 1]); if($('#file_selected').html() == ''){$('#file_selected').html('Выберете файл')} $('.custom-file-upload p').hide();})
        
    </script>
</body>
</html>