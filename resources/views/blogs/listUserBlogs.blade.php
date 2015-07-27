@extends('layout.main')

					@if(Session::has('global'))

					<div class="alert-box alert round">

					    {{ Session::get('global') }}

					     <a href="#" class="close">&times;</a>

					</div>

					@endif


@section('content')

@if ($username == Auth::user()->username)
<a href="{{ URL::route('createBlog', array('username' => urlencode(Auth::user()->username))) }}" >
	Create New Blog
</a>
@endif

@if ($blogs->count() !=0)
	@foreach ($blogs as $blog)
		<article>
			<header>
				<h1><a href="{{ URL::route('viewBlog', array('id' => $blog->id)) }}">{{ $blog->title }}</a></h1>
			</header>
			<div class="content">
				{{ $blog->content }}
			</div>
			<footer>
				<p>Posted {{ $blog->created_at->diffForHumans() }}</p>
			</footer>
		</article>
		<a href="{{ URL::route('editBlog', array('id' => $blog->id))}}">Edit Blog</a>
		<form action="{{ URL::route('deleteBlog', array('id' => $blog->id))}}" method="post">
			<input type="submit" value="Delete Blog">
			{{ Form::token() }}
		</form>
	@endforeach
@else
  <p>Nothing here... yet!</p>
@endif

@stop