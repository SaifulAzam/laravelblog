@extends('layout.main')

@section('content')
		
			<div class="login large-6 small-2 large-centered columns">
				<h1>Account Setting</h1>

					@if(Session::has('global'))
					<div class="alert-box alert round">
					    {{ Session::get('global') }}
					     <a href="#" class="close">&times;</a>
					</div>
					@endif


				<div class="form create">
					<fieldset class="clearfix">

					<form action="{{ URL::route('change-account-post')}}" method="post">

						{{ Form::label('old_password','Old Password') }}
						<p><span class="fontawesome-lock"></span>{{ Form::password('old_password') }}
						{{ $errors->first('old_password','<span class=error>:message</span>')}}</p>


						

						{{ Form::label('password','New Password') }}
						<p><span class="fontawesome-lock"></span>{{ Form::password('password') }}
						{{ $errors->first('password','<span class=error>:message</span>')}}</p>


						{{ Form::label('password_confirmation','Comfirm New Password') }}
						<p><span class="fontawesome-lock"></span>{{ Form::password('password_confirmation') }}
						{{ $errors->first('password_confirmation','<span class=error>:message</span>')}}</p>



						{{ Form::submit('Submit', ['class'=>'button submit-btn'])}}

					</fieldset>
				</div><!-- ./form-->
				{{ Form::token()}}
			{{ Form::close()}}
			</div><!-- ./login-->
		
@stop