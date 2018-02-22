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
	<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
		$(function() {
			var count = 2;

			setInterval(function() {
				$('.cover').css('background-image', 'url(/img/post' + count + '.jpg)');
				count++;
                if (count > 3) count = 1;
			}, 10000);
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
		<div class="cover">
			<div class="content">
				<div class="h1">Продукты для Великого поста</div>
				<div class="p"><span>С 19 февраля по 7 апреля ешьте побольше яблок!</span></div>
				<div class="p"><span>Так вы восполните запас витамина C и железа в организме.</span></div>
				<div class="p"><span>Яблоки прекрасно утоляют жажду и содержат множество полезных элементов: бор, фосфор, цинк, органические кислоты, железо, кальций, серу, магний, селен, фолат, хлор, калий, клетчатку.</span></div>
				<div class="p"><span>Есть в яблоке и витамины: А, Е, В1, В6, РР, С.</span></div>
			</div>
		</div>
		<div class="goods">
            @foreach ($goods as $good)<div class="good">
                <div class="photo"><a href="{{ route('good', $good->id) }}"><img src="{{ property($good, 'photo')->src('small') }}" /></a></div>
                <div class="title"><a href="{{ route('good', $good->id) }}">{{ $good->name }}</a></div>
                @if ($good->available)
                <div class="cart"><i class="fa fa-shopping-cart"></i>{{ (int)$good->price }} руб.</div>
                @endif
            </div>@endforeach
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