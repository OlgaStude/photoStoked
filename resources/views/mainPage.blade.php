<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_mainpage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>photoStoked</title>
</head>

<body onload="message_show()">
    @include('components.header')
<div id="container">

    <div id="banner">
        <div id="banner_wrapper">
            <h1>photo<span>Stoked</span></h1>
            <p>Русскоязычный фото-видео маркет</p>
        </div>
    </div>
    <div id="popular_data">
        @include('components.data_popular')
    </div>
    <div id="popular_authors">
        @foreach($pop_authors as $author)
        <div class="pa_wrapper">
            <a href="{{ url('userpage/'.$author->id) }}"><img src="{{ asset('storage/profile_pics/'.$author->path) }}" alt=""></a>
            <a href="{{ url('userpage/'.$author->id) }}"><p>{{ $author->nikname}}</p></a>
        </div>
        @endforeach
    </div>
    
    
    <div id="post_data">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>