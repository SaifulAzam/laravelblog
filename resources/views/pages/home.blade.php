@extends('layout.main')

@section('content')


{{-- 		{{implode(' ', $lessons)}} --}}

		<h1>Home page.{{$first}}</h1>

		<h2>{{  $_SERVER['SERVER_NAME']}}</h2>

		 @if(Session::has('global'))
		<div class="alert-box success">
		    <h2>{{ Session::get('global') }}</h2>
		</div>
		@endif
@stop
