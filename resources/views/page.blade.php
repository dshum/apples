@extends('layouts.base')

@section('title')
{{ $element->name }}
@endsection

@section('content')
<h1>{{ $element->name }}</h1>
{!! $element->fullcontent !!}
@endsection