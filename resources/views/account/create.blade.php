@extends('layout.main')

@section('content')

			<div class="register large-6 small-2 large-centered columns">
				<h1> Create an Account</h1>
				
				{{ Form::open(array('url' => '/account/create', 'files' => true )) }}
				<!-- <form action="{{ URL::route('account-create-post')}}" method="post"> -->
				<div class="form create">
					<fieldset class="clearfix">

					{{ Form::label('photo','Photo',array('id'=>'','class'=>'')) }}
  					{{ Form::file('photo') }}


					{{ Form::label('username','Username') }}
					{{ Form::input('text','username') }}
					{{ $errors->first('username','<span class=error>:message</span>')}}

					{{ Form::label('email','Email') }}
					{{ Form::text('email') }}
					{{ $errors->first('email','<span class=error>:message</span>')}}



					{{ Form::label('password','Password') }}
					{{ Form::password('password') }}
					{{ $errors->first('password','<span class=error>:message</span>')}}

					{{ Form::label('password_confirmation','Comfire Password') }}
					{{ Form::password('password_confirmation') }}
					{{ $errors->first('password_confirmation','<span class=error>:message</span>')}}

					<!-- reset buttons -->
  					{{ Form::reset('Reset',['class'=>'button [radius round]']) }}

  					{{ Form::token()}}

					{{ Form::submit('Submit', ['class'=>'button [radius round]'])}}

					</fieldset>
				</div>
			{{ Form::close()}}
			</div>
@stop