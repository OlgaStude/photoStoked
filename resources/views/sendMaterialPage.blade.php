<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Предложите ваши материалы</title>
</head>
<body>
@include('components.header')
    <form action="{{ route('sendMaterial') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="material">
        @error('material')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Введите сюда теги">
        @error('tags')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Отправить на проверку</button>
        @if(session('success_message') !== null)
            {{ session('success_message') }}
            {{ Session::forget('success_message') }}
        @endif
    </form>
</body>
</html>