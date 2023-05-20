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
    <title>Понравившееся</title>
    <style>
        img{
                width: 100px;
            }
            .material{
                width: 400px;
                
            }
            #loading{
                position: fixed;
                bottom: 10px;
                left: 30px;
    
                background-color: yellow;
            }
            .liked{
                background-color: red;
            }
            .notliked{
                background-color: grey;
            }
            #footer_div{
                height: 30px;
            }
    </style>
</head>

<body onload="message_show()">
@include('components.header')
    
    <div id="post_data">
        @include('components.data')
    </div>

    <div id="footer_div"></div>


</body>

<script>
        function loadMoreData(id){
            $.ajax({
                url: "{{ route('userLikedPage') }}",
                method: 'GET',
                data: {id: id}, 
                success: function(data){
                    $("#loading").remove();
                    $("#last_id").remove();
    
                    console.log(data);
                
                    $("#post_data").append(data);
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError){
                $("#loading").remove();

                console.log(throwError);
            })
        }

        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                $("#loading").show();
                let id = $("#last_id").val();
                console.log(id);
                loadMoreData(id);
            }
        });
    </script>
</html>