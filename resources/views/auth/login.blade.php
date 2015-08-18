@extends('layout.main')

@section('title', 'Sign In')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Sign In</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
<div class="col-md-6">
	{!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}
	<h1>Sign In to Your Author Account</h1>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		There were some problems signing into your account:
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('email', 'Your E-mail Address') !!}
		{!! Form::text('email', null,
		array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Your Password') !!}
		{!! Form::password('password',
		array('class'=>'form-control', 'placeholder'=>'Password')) !!}
	</div>
	<div class="form-group">
		<label>
			{!! Form::checkbox('remember', 'remember') !!} Remember Me
		</label>
	</div>
	<div class="form-group">
		{!! Form::submit('Login', array('class'=>'btn btn-primary')) !!}
	</div>
	<a href="/password/email">Forgot Your Password?</a>
</div>
</div>
{!! Form::close() !!}
</div>
@endsection