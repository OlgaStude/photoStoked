<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <style>
    #collections div,
    .collection_cover {
        width: 200px;
        height: 200px;
        border: 1px solid black;
    }
    </style>
    <title>Коллекции</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <h1>Ваши коллекции здесь</h1>

    <input type="text" placeholder="Имя коллекции" id="collection_name">
    <button onclick="create()">+</button>

    <div id="collections">
        @include('components.collections')
    </div>

    <script>
    function create(name = $('#collection_name').val()) {
        $.ajax({
                url: '{{ route("makecollection") }}',
                method: 'GET',
                data: {
                    name: name
                },
                success: function(data) {
                    $('#collections').empty().append(data);
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError) {
                $("#loading").remove();
            })
    }
    </script>
</body>

</html>