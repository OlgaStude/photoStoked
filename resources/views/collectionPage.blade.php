<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <style>
    .liked {
        background-color: red;
    }

    .notliked {
        background-color: gray;
    }

    footer {
        height: 30px;
    }
    </style>
    <title>{{ $collection[0]->name }}</title>
</head>

<body onload="message_show()">
    @include('components.header')
    <p><a href="{{ route('collections') }}">К коллекциям</a></p>
    <h1>{{ $collection[0]->name }}</h1>
    <div id="materials">
        @include('components.collection_items')
    </div>

    <footer>

    </footer>
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

                    $("#materials").append(data);
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