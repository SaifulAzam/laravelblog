@extends('layout.main')
@if(Session::has('global'))
<div class="alert-box alert round">
    {{ Session::get('global') }}
     <a href="#" class="close">&times;</a>
</div>
@endif
@section('content')
	<div>
		@if ($blogs->count() !=0)
			@foreach ($blogs as $blog)
	          <article>
	            <h3><a href="{{ action('BlogsController@show', ($blog->id)) }}">{{ $blog->title }}</a></h3>
	            <h6>Written by <a href="#">{{ $blog->author }}</a> on {{ $blog->date }}</h6>

	            <div class="row">
	              <div class="large-6 columns">
	                {{ $blog->excerpt }}
	              </div>
	              <div class="large-6 columns">
					{{ $blog->img }}
	              </div>
	            </div>
				{{ $blog->content }}
	          </article>
	          <hr/>
			@endforeach
		@else
		  <p>Nothing here... yet!</p>
		@endif
	</div>
@stop
