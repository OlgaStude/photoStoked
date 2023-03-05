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
    </style>
    <title>photoStoked</title>
</head>
<body>
@include('components.header')
    
<h1>It's the main page!</h1>

<div id="posts_data">
    @include('components.data')
</div>


<script>
    function loadMoreData(id = ""){
        $.ajax({
            url: '{{ route("mainpage") }}',
            method: 'GET',
            data: {id: id},
            success: function(data){
                $("#loading").remove();
                $("#last_id").remove();

                console.log('success');
            
                $("#posts_data").append(data);
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError){
            $("#loading").remove();
        })
    }
    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
            $("#loading").show();

            let id = $("#last_id").val();
            loadMoreData(id);
        }
    })
</script>
</body>
</html>