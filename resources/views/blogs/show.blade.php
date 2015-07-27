@extends('layout.main')
@section('content')
	<article>
		<header>
			<h1>{{ $blog->title }}</h1>
		</header>
		<div class="content">
			{{ $blog->content }}
		</div>
		<footer>
			<p>Posted {{ $blog->created_at->diffForHumans() }}</p>
			<a href="{{ URL::route('editBlog', array('id' => $blog->id))}}">Edit Blog</a>
			<form action="{{ URL::route('deleteBlog', array('id' => $blog->id))}}" method="post">
				<input type="submit" value="Delete Blog">
				{{ Form::token() }}
			</form>
		</footer>
	</article>

	<section id="comments">
		@foreach($blog->comments as $comment)
			<div>
				<p>{{ $comment->name }} says...</p>
				<blockquote>{{ $comment->content }}</blockquote>
				@if(Auth::check())
					@if(strcmp(Auth::user()->username, $comment->name)==0)
						<form action="{{ URL::route('deleteComment', array('comment_id' => $comment->id))}}" method="post">
							<input type="submit" value="Delete Comment">
							{{ Form::token() }}
						</form>
					@endif
				@endif
			</div>
		@endforeach
	</section>
	<section>
		<h3 class="title">Add a comment</h3>
		<form action="{{ URL::route('createComment', array('id' => $blog->id))}}" method="post">
			<div class="field">
				<h1>{{ $blog->user->username }}</h1>
			</div>
			<div class="filed">
				<textarea id="comment_content" name="content" class="form-control" placeholder="Write here..."></textarea>
			</div>
			<input type="submit" class="btn btn-primary" />
			{{ Form::token() }}
			<script>
	            // Replace the <textarea id="editor1"> with a CKEditor
	            // instance, using default configuration.
	            CKEDITOR.replace( 'comment_content' );
	        </script>
		</form>
	</section>
@stop
