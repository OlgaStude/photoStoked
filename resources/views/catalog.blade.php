<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style_catalog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
    <title>Каталог</title>
</head>
<body onload="message_show()">
@include('components.header')
    <div id="container">

<div id="filter">
    <div id="filter_bar">
        <div id="filter_bar_text" onclick="open_close()">
            <img src="{{ asset('storage/img/Arrow_down.png') }}" alt="">
            <p>Фильтрация</p>
        </div>
        <input type="text" id="search_bar" placeholder="Введите ключевое слово (цветы, люди, бег...)">
    </div>
    <div id="filter_options" class="closed">
        <form action="" id="filter_form" method="get">
            @csrf
            <div id="demention_options">
                <input type="radio" name="dementions" value="square" id="square">
                <label for="square">квадратная</label><br>
                <input type="radio" name="dementions" value="horisontal" id="horizontal">
                <label for="horizontal">горизонтальная</label><br>
                <input type="radio" name="dementions" value="vertical" id="vertical">
                <label for="vertical">вертикальная</label><br>
            </div>
            <div id="type_options">
                <input type="radio" name="type" value="photo" id="photo">
                <label for="photo">фото</label><br>
                <input type="radio" name="type" value="video" id="video">
                <label for="video">видео</label><br>
                <input type="radio" name="type" value="illustration" id="illustration">
                <label for="illustration">иллюстрация</label>
            </div>
            <div id="filter_btns">
                <button id="sort_btn" type="submit">сортировать</button>
                <button id="cancel_btn">сбросить</button>
            </div>
        </form>
    </div>
</div>  

<div id="tags">
    <div id="tags_wrapper">
        <div class="arrow_btn back_tags"><img id="back_tags" src="{{ asset('storage/img/Arrow_tags.png') }}" alt=""></div>
        <div class="owl-carousel">
            @foreach($tags as $tag)
                <div class="slider__item">
                    <p class="tag"><a href="#" class="tag_link">{{ $tag->tag_name }}</a></p>
                </div>
            @endforeach
        </div>
        <div class="arrow_btn forward_tags"><img id="forward_tags" src="{{ asset('storage/img/Arrow_tags.png') }}" alt=""></div>
    </div>
</div>
        
        
        
    
    @php($lastId = 0)
    <div id="post_data">
        @include('components.data')
    </div>
    @if(isset($materials[0]->id))
    @php($first_id = $materials[0]->id)
    <input type="text" id='first_id' value="{{ $first_id }}" hidden>
    @endif
    
</div>
@include('components.footer')

    
    <script>

        function open_close(){
            if($('#filter_options').hasClass('closed')){
                $('#filter_options').removeClass('closed').addClass('opened');
                $('#filter_bar_text img').addClass('rotete');
            }else{
                $('#filter_options').removeClass('opened').addClass('closed');
                $('#filter_bar_text img').removeClass('rotete');
            }
        }

        function loadMoreData(id = "", type = '', dementions = '', search_word = '', tag_name = ''){
            $.ajax({
                url: '{{ route("catalog") }}',
                method: 'GET',
                data: {id: id, type: type, dementions: dementions, search_word: search_word, tag_name: tag_name}, 
                success: function(data){
                    $("#loading").remove();
                    $("#last_id").remove();
    
                    $("#post_data").append(data);
                    console.log(data);
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError){
                $("#loading").remove();
            })
        }
        $(window).scroll(function(type = $('input[name=type]:checked', '#filter_form').val()){
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 1){
                $("#loading").show();
                let id = $("#last_id").val();
                $("#last_id").remove();
                
                if($('#tags p').find('a.active').length !== 0){
                    let tag_name = $('#tags p').find('a.active').text();
                    loadMoreData(id, '', '', '', tag_name);
                }
                else if($('#search_bar').val() != ''){
                    let search_word = $('#search_bar').val();
                    loadMoreData(id, '', '', search_word);
                }
                else if($('input[name=type]:checked', '#filter_form').val() != undefined && $('input[name=dementions]:checked', '#filter_form').val() != undefined){
                    let type = $('input[name=type]:checked', '#filter_form').val();
                    let dementions = $('input[name=dementions]:checked', '#filter_form').val();
                    loadMoreData(id, type, dementions);
                }
                else if($('input[name=type]:checked', '#filter_form').val() != undefined){
                    let type = $('input[name=type]:checked', '#filter_form').val();
                    loadMoreData(id, type);
                }
                else if($('input[name=dementions]:checked', '#filter_form').val() != undefined){
                    let dementions = $('input[name=dementions]:checked', '#filter_form').val();
                    loadMoreData(id, '', dementions);
                }
                else{
                    
                    loadMoreData(id);
                }

            }
        })


        function loadOthersTags(id = ""){
            $.ajax({
                url: '{{ route("catalog") }}',
                method: 'GET',
                data: {tag_id: id}, 
                success: function(data){
                    $('#tags').empty();
                    $('#tags').append(data);
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError){
                let id = $('#tag_back_btn').val() + 1;
                loadOthersTags(id);
                
            })
        }
        $('body').on('click','#tag_btn', function(){
            let id = $(this).val();
            loadOthersTags(id);
        });
        
        

        $('body').on('click', '.tag_link', function(){
            $('#tags p').find('a.active').removeClass('active');
            $(this).addClass('active');
            let tag_name = $(this).text();
            let id = parseInt($("#first_id").val()) + 1;
            $("#post_data").empty();
            $('#search_bar').val('');
            loadMoreData(id, '', '', '', tag_name);

        });


        $('#search_bar').keypress(function(event){
            $('#tags p').find('a.active').removeClass('active');
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                let id = parseInt(parseInt($("#first_id").val())) + 1;
                $("#post_data").empty();
                let search_word = $(this).val();
                loadMoreData(id, '', '', search_word);
            }
        });

        
        $('#sort_btn').click(function(e){
            e.preventDefault();
            $('#tags p').find('a.active').removeClass('active');

            $('#search_bar').val('');
            let id = parseInt($("#first_id").val()) + 1;
            if($('input[name=type]:checked', '#filter_form').val() != undefined && $('input[name=dementions]:checked', '#filter_form').val() != undefined){
                let type = $('input[name=type]:checked', '#filter_form').val();
                let dementions = $('input[name=dementions]:checked', '#filter_form').val();
                $("#post_data").empty();
                loadMoreData(id, type, dementions);
            }
            else if($('input[name=type]:checked', '#filter_form').val() != undefined){
                let type = $('input[name=type]:checked', '#filter_form').val();
                $("#post_data").empty();
                loadMoreData(id, type);
            }
            else if($('input[name=dementions]:checked', '#filter_form').val() != undefined){
                let dementions = $('input[name=dementions]:checked', '#filter_form').val();
                $("#post_data").empty();
                loadMoreData(id, '', dementions);
            }
        });
        $('#sort_btn').click(function(){
            $("input:radio").removeAttr("checked");
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            items:6,
            loop:true,
            mouseDrag: false,
        });
        $('.back_tags').click(function() {
            $('.owl-carousel').trigger('next.owl.carousel');
        })
        $('.forward_tags').click(function() {
            $('.owl-carousel').trigger('prev.owl.carousel');
        })
    </script>
</body>
</html>