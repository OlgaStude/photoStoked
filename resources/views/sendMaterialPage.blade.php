<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_sendMaterial.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Предложите ваши материалы</title>
</head>
<body onload="message_show()">
@include('components.header')
<div id="container">

<p id="explanation">Ваш материал будет проверен на качество и соответствие правил нашего сайта. Проверка может занять до двух недель, по стечению этого срока или раньше, если ваша работа прошла, вы увидите её отображённой на своей личной странице</p>
    <form action="{{ route('sendMaterial') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="custom-file-upload input-file">
        <input class="file_upload" type="file" name="material">
        <span id="file_selected"></span>
        <P>Ваш материал</P>
        </label>
        @error('material')
        <p class="error_file">{{ $message }}</p>
        @enderror
        <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Введите теги через запятую">
        @error('tags')
        <p class="error_tags">{{ $message }}</p>
        @enderror
        <button type="submit">Отправить на проверку</button>
        @if(session('success_message') !== null)
        <p class="succsess">{{ session('success_message') }}</p>
            {{ Session::forget('success_message') }}
            @endif
        </form>
    </div>
    @include('components.footer')
</body>

<script>
        $('.file_upload').bind('change', function() { var fileName = ''; fileName = $(this).val().split('\\'); $('#file_selected').html(fileName[fileName.length - 1]); if($('#file_selected').html() == ''){$('#file_selected').html('Выберете файл')} $('.custom-file-upload p').hide();})

    </script>
</html>