<!DOCTYPE html>
<html>
<head>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>@yield('title')</title>
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/default.css') }}" rel="stylesheet">
	<link href="{{ asset('css/base.css') }}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
		$(function() {
			
		});
	</script>
</head>
<body>
	<div class="container">
		<nav>
			<div class="logo"><a href="{{ route('welcome') }}">Яблоки!</a></div>
			<ul class="menu">
				<li><a href="{{ route('delivery') }}">Доставка</a></li>
				<li><a href="{{ route('contacts') }}">Контактная информация</a></li>
				<li><a href="{{ route('feedback') }}">Обратная связь</a></li>
			</ul>
			<ul class="user">
				<li class="cart-amount"><a href="">В корзине 4 товара</a></li>
				@if (Auth::check())
				<li><a href="{{ route('home') }}">{{ Auth::user()->email }}</a></li>
				@else
				<li><a href="{{ route('login') }}">Войти</a></li>
				<li><a href="{{ route('register') }}">Зарегистрироваться</a></li>
				@endif
			</ul>
		</nav>
		<div class="cover"></div>
		<div class="main">
			@yield('content')
		</div>
		<div class="footer">
            <div class="content">
                <div class="column">
                    <div class="h1">Яблоки! {{ date('Y') }}</div>
                    <div class="p">Под управлением Moonlight</div>
                </div>
                <div class="column">
                    <div class="h1">Что еще?</div>
                    <div class="p"><a href="{{ route('delivery') }}">Доставка</a></div>
                    <div class="p"><a href="{{ route('contacts') }}">Контактная информация</a></div>
                    <div class="p"><a href="{{ route('feedback') }}">Обратная связь</a></div>
                </div>
                <div class="column">
                    @if (Auth::check())
                    <div class="h1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    <div class="p"><a href="{{ route('home') }}">История заказов</a></div>
                    <div class="p"><a href="{{ route('profile') }}">Профиль</a></div>
                    <div class="p"><a href="{{ route('logout') }}">Выход</a></div>
                    @else
                    <div class="h1">Личный кабинет</div>
                    <div class="p"><a href="{{ route('login') }}">Вход</a></div>
                    <div class="p"><a href="{{ route('register') }}">Регистрация</a></div>
                    @endif
                </div>
            </div>
        </div>
	</div>
</body>
</html>