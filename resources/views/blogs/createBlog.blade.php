@extends('layout.main')

@section('content')
	{!! Form::open(['url' => 'blogs']) !!}
		<div class="row">
			<div class="large-6 columns">
				{!! Form::label('title', 'Title:') !!}
				{!! Form::text('title', null) !!}
{{-- 			@if($errors->has('title'))
				{{ $errors->first('title')}}
			@endif --}}
			</div>
			<div class="large-6 columns">
				{!! Form::label('slug', 'Slug:') !!}
				{!! Form::text('slug', null) !!}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{!! Form::label('content', 'Content:') !!}
				{!! Form::textarea('content', null) !!}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{!! Form::label('published_at', 'Content:') !!}
				{!! Form::input('date', 'published_at', null) !!}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{!! Form::submit('Add Blog', ['class' => 'button']) !!}
			</div>
		</div>
	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop
