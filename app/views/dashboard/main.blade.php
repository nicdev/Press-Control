@extends('dashboard.layout')

@section('header')
	@parent
@stop

@section('content')
	
	<div class="row">

		<div class="col-xs-12 col-sm-3 col-md-2 dashboard-controls">
			<ul>
				<li><a href=# title="home"><i class="fa fa-home"></i> Main</a></li>
				<li><a href=# title="sites"><i class="fa fa-sitemap"></i> WP Sites</a></li>
				<li><a href=# title="plugins"><i class="fa fa-gears"></i> Plugins</a></li>
				<li><a href=# title="themes"><i class="fa fa-desktop"></i> Themes</a></li>
				<li><a href=# title="alerts"><i class="fa fa-bullhorn"></i> Alerts</a></li>
			</ul>
		</div>

		<div class="col-xs-12 col-sm-9 col-md-10">
						
			@foreach ($sites as $s)

				<div class="col-sm-3 col-xs-1 wp-instance">
		    
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