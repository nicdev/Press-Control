@extends('dashboard.layout')

@section('header')
	@parent
@stop

@section('content')
	
	<div class="row">
		<div class="span12">
			
			@foreach ($sites as $s)

				<div class="span4 wp-instance">
		    
		    		<p>Site: {{ $s->title }}</p>
		    
		    	</div>
			
			@endforeach

		</div><!-- /span12 -->
	</div><!-- /row -->

@stop

@section('footer')
	
@stop

@section('analytics')
	@parent
@stop