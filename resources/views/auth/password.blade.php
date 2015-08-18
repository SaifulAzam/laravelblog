@extends('layout.main')

@section('title', 'Password Resetting')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Password Resetting</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
<div class="col-md-6">
	{!! Form::open(array('url' => '/password/email', 'class' => 'form')) !!}
	<h1>Recover Your Password</h1>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		There were some problems recovering your password:
		<br />
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('email', 'Your E-mail Address') !!}
		{!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('E-mail Password Reset Link',
		array('class'=>'btn btn-primary')) !!}
	</div>
	{!! Form::close() !!}
</div>
@endsection