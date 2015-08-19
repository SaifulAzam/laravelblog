<div class="form-group"> 
  {!! Form::label('Title') !!}
  {!! Form::text('title', null, ['required', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('Excerpt') !!}
  {!! Form::textarea('excerpt', null, ['required', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('Content') !!}
  {!! Form::textarea('content', null, ['required', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('Published Date') !!}
  {!! Form::input('date', 'published_at', null, ['required', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('categories', 'Categories') !!}
	{!! Form::select('categories[]', $categories, null, ['id' => 'categories', 'class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
  {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>