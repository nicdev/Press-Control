@extends('dashboard.layout')

@section('header')
	@parent
@stop

@section('content')
	@foreach ($sites as $s)
    	<p>Site: {{ $s->title }}</p>
	@endforeach
@stop

@section('footer')
	
@stop

@section('analytics')
	@parent
@stop