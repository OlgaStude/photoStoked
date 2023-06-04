<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_collection.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>{{ $collection[0]->name }}</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <div id="container">
        <div id="top_text">
            <a href="{{ route('collections') }}"><img id="go_back_arrow" src="{{ asset('storage/img/go_back_arrow.png') }}" alt=""><p id="go_bak_text">Назад к коллекциям</p></a>
            <h1>{{ $collection[0]->name }}</h1>
        </div>
        <div id="post_data">
            @include('components.collection_items')
        </div>
        
    </div>
    @include('components.footer')
        
            <script>
                function loadMoreData(id = "") {
                    $.ajax({
                        url: '{{ route("collection", $collection[0]->id) }}',
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
            })
    }
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 1) {
            $("#loading").show();

            let id = $("#last_id").val();
            $("#last_id").remove();
            loadMoreData(id);
        }
    })
    </script>

</body>

</html>