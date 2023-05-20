<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
    <title>Каталог</title>
    <style>
        img, video{
            width: 900px;
        }
        #loading{
            position: fixed;
            bottom: 0px;
            text-align: center;
            background-color: wheat;
        }
        #tags p{
            display: inline;
        }
        #footer_div{
            height: 35px;
        }
        .liked{
            background-color: red;
        }
        .notliked{
            background-color: grey;
        }
    </style>
</head>
<body onload="message_show()">
@include('components.header')
    
    <h1>Каталог</h1>

    <div id="tags">
        @include('components.tags')
    </div>
@if(isset($tags[0]->id))
    <input hidden id="tag_back_btn" value="{{ $tags[0]->id }}">
    @endif


    <input type="text" id="search_bar">

    <form action="" id="filter_form" method="get">
        @csrf
        <input type="radio" name="dementions" value="square" id="square">
        <label for="square">квадратная</label>
        <input type="radio" name="dementions" value="horisontal" id="horizontal">
        <label for="horizontal">горизонтальная</label>
        <input type="radio" name="dementions" value="vertical" id="vertical">
        <label for="vertical">вертикальная</label>
        <hr>
        <input type="radio" name="type" value="photo" id="photo">
        <label for="photo">фото</label>
        <input type="radio" name="type" value="video" id="video">
        <label for="video">видео</label>
        <input type="radio" name="type" value="illustration" id="illustration">
        <label for="illustration">иллюстрация</label>
        <hr>
        <button id="sort_btn" type="submit">сортировать</button>
        <button id="cancel_btn">сбросить</button>
    </form>
    
@php($lastId = 0)
    <div id="posts_data">
        @include('components.data')
    </div>
@if(isset($materials[0]->id))
    @php($first_id = $materials[0]->id)
    <input type="text" id='first_id' value="{{ $first_id }}" hidden>
    @endif
    
    <div id="footer_div"></div>
    
    <script>
        function loadMoreData(id = "", type = '', dementions = '', search_word = '', tag_name = ''){
            $.ajax({
                url: '{{ route("catalog") }}',
                method: 'GET',
                data: {id: id, type: type, dementions: dementions, search_word: search_word, tag_name: tag_name}, 
                success: function(data){
                    $("#loading").remove();
                    $("#last_id").remove();
    
                    $("#posts_data").append(data);
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
            $("#posts_data").empty();
            $('#search_bar').val('');
            loadMoreData(id, '', '', '', tag_name);

        });


        $('#search_bar').keypress(function(event){
            $('#tags p').find('a.active').removeClass('active');
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                let id = parseInt(parseInt($("#first_id").val())) + 1;
                $("#posts_data").empty();
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
                $("#posts_data").empty();
                loadMoreData(id, type, dementions);
            }
            else if($('input[name=type]:checked', '#filter_form').val() != undefined){
                let type = $('input[name=type]:checked', '#filter_form').val();
                $("#posts_data").empty();
                loadMoreData(id, type);
            }
            else if($('input[name=dementions]:checked', '#filter_form').val() != undefined){
                let dementions = $('input[name=dementions]:checked', '#filter_form').val();
                $("#posts_data").empty();
                loadMoreData(id, '', dementions);
            }
        });
        $('#sort_btn').click(function(){
            $("input:radio").removeAttr("checked");
        });

    </script>
</body>
</html>