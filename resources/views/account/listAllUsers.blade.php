@extends('layout.main')

@section('content')

@if ($users->count() !=0)
	@foreach ($users as $user)
		<a href="{{ URL::route('listUserBlogs', array( 'username' => urlencode($user->username))) }}"><h1>{{ $user->username }}</h1></a>
	@endforeach
@else
  <p>No one registered... yet!</p>
@endif

@stop