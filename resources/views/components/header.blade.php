<section id="header">
    <div id="header_left">
        <a href="{{ route('mainpage') }}"><img id="logo" src="{{ asset('storage/img/logo.png') }}" alt=""></a>
        <p><a href="{{ route('catalog') }}">Каталог</a></p>
    </div>
    <div id="header_right">
        @guest
        <p><a href="{{ route('userLogin') }}">Войти</a></p>
        <p><a href="{{ route('registration') }}">Регистрация</a></p>
        @endguest
        @auth
        @if(Auth::user()->is_admin !== NULL)
        <p><a href="{{ route('approvalpage') }}">Поданные материалы</a></p>
        @endif
        <p><a href="{{ route('sendMaterialPage') }}">Предложить материал</a></p>
        <p><a href="{{ route('buyingpage') }}">Приобрести пакеты</a></p>
        <p><a href="{{ route('logout')}}">Выйти</a></p>
        <span class="no_message"><img onclick="show_hide()" id="header_bell" src="{{ asset('storage/img/bell_icon.png') }}" alt=""></span>
        <a href="{{ url('userpage/'.Auth::user()->id) }}"><img id="header_pfp" src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt=""></a>
        <div id="messeges" class="mess_invisible">
            
            @include('components\message')
        </div>
        <script>

            function message_show(){
                $.ajax({
                    url: "{{ route('messages') }}",
                    method: 'GET',
                    data: {},
                    success: function(data){
                    $('#messeges').append(data)
                    if(data == ''){
                        $('#messeges').html('<p id="message_none">Пока ничего...</p>');
                    }else{
                        $('.no_message').removeClass('no_message');
                    }
                }
            })
                .fail(function(jqXHR, ajaxOpions, throwError){
                })
            }

            function show_hide(){
                if($('#messeges').hasClass('mess_invisible')){
                    $('#messeges').removeClass('mess_invisible').addClass('mess_visible');
                }else{
                    $('#messeges').removeClass('mess_visible').addClass('mess_invisible');
                }
                
            }
            
            function delete_mess(id){
                $.ajax({
                    url: "{{ route('messagesdelete') }}",
                    method: 'GET',
                    data: {id: id},
                    success: function(data){
                        $('#messeges').empty();
                        
                        $('#messeges').append(data);
                        if(data == ''){
                            $('#messeges').html('<p id="message_none">Пока ничего...</p>');
                            $('.no_message').removeClass('no_message');
                        }
                        
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError){
                })
            }
            </script>
        @endauth
    </div>
    </section>
