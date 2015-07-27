@extends('layout.main')



@section('content')

		

			<div class="login large-6 small-2 large-centered columns">

				<h1>Log In</h1>



					@if(Session::has('global'))

					<div class="alert-box alert round">

					    {{ Session::get('global') }}

					     <a href="#" class="close">&times;</a>

					</div>

					@endif





				<div class="form create">

					<fieldset class="clearfix">



					<form action="{{ URL::route('account-sign-in-post')}}" method="post">



						{{ Form::label('email','Email') }}

						 <p><span class="fontawesome-user"></span>{{ Form::text('email') }}

						 {{ $errors->first('email','<span class=error>:message</span>')}}</p>



						{{ Form::label('password','Password') }}

						<p><span class="fontawesome-lock"></span>{{ Form::password('password') }}

						{{ $errors->first('password','<span class=error>:message</span>')}}</p>





						<p><input type="checkbox" name="remember" id="remember">

						<label for="remember">Remember me</label><p>



						{{ Form::submit('Submit', ['class'=>'button submit-btn'])}}



					<p>Not a member? <a href="{{ URL::route('account-create')}}">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

					

					<p> <a href="{{ URL::route('account-forgot-password')}}"> Forget password? </a</p>

					</fieldset>

				</div><!-- ./form-->

				{{ Form::token()}}

			{{ Form::close()}}

			</div><!-- ./login-->

		

@stop