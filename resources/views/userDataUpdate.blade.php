<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование данных</title>
</head>
<body  onload="message_show()">

@include('components.header')

    <form action="{{ route('userUpdateAction', collect(request()->segments())->last()) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" hidden value="{{ Auth::user()->id }}" name="id">
        <input type="text" name="name" placeholder="изменить имя" value="{{ Auth::user()->name }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="surname" placeholder="изменить фамилию" value="{{ Auth::user()->surname }}">
        @error('surname')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="nikname" placeholder="изменить ваше прозвище" value="{{ Auth::user()->nikname }}">
        @error('nikname')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="email" placeholder="изменить почту" value="{{ Auth::user()->email }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="pfp">
        @error('file')
            <p>{{ $message }}</p>
        @enderror
        <input type="date" name="birthdate" value="{{ Auth::user()->birthdate }}">
        <textarea name="add_info" id="" cols="30" placeholder="расскажите немного о себе" rows="10"  value="">{{ Auth::user()->add_info }}</textarea>
        @error('add_info')
            <p>{{ $message }}</p>
        @enderror
        
        <button type="submit">Применить изменения</button>
    </form>
</body>
</html>