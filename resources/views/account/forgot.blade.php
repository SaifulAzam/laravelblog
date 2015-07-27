@extends('layout.main')

@section('content')
		
			<div class="login large-6 small-2 large-centered columns">
				<h1>Forgot Password</h1>

					@if(Session::has('global'))
					<div class="alert-box alert round">
					    {{ Session::get('global') }}
					     <a href="#" class="close">&times;</a>
					</div>
					@endif


				<div class="form create">
					<fieldset class="clearfix">

					<form action="{{ URL::route('account-forgot-password-post')}}" method="post">

						{{ Form::label('email','Email') }}
						{{ Form::text('email') }}
						{{ $errors->first('email','<span class=error>:message</span>')}}

						{{ Form::submit('Recover', ['class'=>'button submit-btn'])}}

					</fieldset>
				</div><!-- ./form-->
				{{ Form::token()}}
			{{ Form::close()}}
			</div><!-- ./login-->
		
@stop