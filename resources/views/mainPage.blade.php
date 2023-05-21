<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_mainpage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>photoStoked</title>
</head>

<body onload="message_show()">
    @include('components.header')
<div id="container">

    
    <h1>It's the main page!</h1>
    
    <div id="popular_authors">
        @foreach($pop_authors as $author)
        <a href="{{ url('userpage/'.$author->id) }}"><p>{{ $author->nikname}}</p>
        <img src="{{ asset('storage/profile_pics/'.$author->path) }}" alt=""></a>
        @endforeach
    </div>
    <hr>
    <div id="popular_data">
        @include('components.data_popular')
    </div>
    <hr>
    
    <div id="posts_data">
        @include('components.data')
    </div>
    
</div>
@include('components.footer')
    
    <script>
        function loadMoreData(id = "") {
            $.ajax({
                url: '{{ route("mainpage") }}',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $("#loading").remove();
                    $("#last_id").remove();

                    console.log('success');

                    $("#posts_data").append(data);
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
            loadMoreData(id);
        }
    })
    </script>
</body>

</html>