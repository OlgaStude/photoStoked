<section class="header">
<a href="{{ route('mainpage') }}">Главная</a>
<a href="{{ route('catalog') }}">Каталог</a>
    @guest
        <a href="{{ route('userLogin') }}">Войти</a>
        <a href="{{ route('registration') }}">Регистрация</a>
    @endguest
    @auth
        <a href="{{ route('sendMaterialPage') }}">Предложить материал</a>
        <a href="{{ url('userpage/'.Auth::user()->id) }}">Личный кабинет</a>
        <a href="{{ route('logout')}}">Выйти</a>
        @if(Auth::user()->is_admin !== NULL)
            <a href="{{ route('approvalpage') }}">Поданные материалы</a>
        @endif
    @endauth
    </section>