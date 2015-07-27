@extends('layout.main')

@section('content')
    <h1>{{ Auth::user() -> username}}'s Blog</h1>
	<form action="{{ URL::route('updateBlog', array('id' => $id)) }}" method="post">
		<div class="field">
			Title: <input type="text" name="title" value="{{ $title }}">
			@if($errors->has('title'))
				{{ $errors->first('title')}}
			@endif
		</div>
		<div class="field">
			<textarea id="blog_content" name="content" rows="10" placeholder="Write here...">{{ $content }}</textarea>
			@if($errors->has('content'))
				{{ $errors->first('content')}}
			@endif
		</div>
		<input type="submit" value="Update Blog" >
		{{ Form::token() }}
		<script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'blog_content' );
        </script>
	</form>
@stop