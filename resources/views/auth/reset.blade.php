@extends('layout.main')

@section('title', 'Reset Password')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Reset Password</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
<div class="col-md-6">
	{!! Form::open(array('url' => '/password/reset',
	'class' => 'form')) !!}
	<h1>Reset Password</h1>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		There were some problems resetting the password:
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<input type="hidden" name="token" value="{{ $token }}">
	<div class="form-group">
		{!! Form::label('Your E-mail Address') !!}
		{!! Form::text('email', null,
		array(
		'class'=>'form-control',
		'placeholder'=>'Email Address')
		) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Your Password') !!}
		{!! Form::password('password',
		array('class'=>'form-control', 'placeholder'=>'Password')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Confirm Password') !!}
		{!! Form::password('password_confirmation',
		array(
		'class'=>'form-control',
		'placeholder'=>'Confirm Password')
		) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Reset Password',
		array('class'=>'btn btn-primary')) !!}
	</div>
	{!! Form::close() !!}
</div>
@endsection