@extends('layouts.base')

@section('title')
{{ $currentGood->name }}
@endsection

@section('content')
<h1>{{ $currentGood->name }}</h1>
<div class="current-good">
    <div class="photo"><img src="{{ property($currentGood, 'photo')->src('medium') }}" /></div>
    <div class="description">
        <div class="fullcontent">{!! $currentGood->fullcontent !!}</div>
        @if ($currentGood->available)
        <div class="cart"><i class="fa fa-shopping-cart"></i>{{ (int)$currentGood->price }} руб. / кг</div>
        @endif
    </div>
</div>
<h2>Другие яблочки</h2>
<div class="goods">
@foreach ($goods as $good)
@if ($good->id != $currentGood->id)<div class="good">
    <div class="photo"><a href="{{ route('good', $good->id) }}"><img src="{{ property($good, 'photo')->src('small') }}" /></a></div>
    <div class="title"><a href="{{ route('good', $good->id) }}">{{ $good->name }}</a></div>
    @if ($good->available)
    <div class="cart"><i class="fa fa-shopping-cart"></i>{{ (int)$good->price }} руб.</div>
    @endif
</div>@endif
@endforeach
</div>
@endsection