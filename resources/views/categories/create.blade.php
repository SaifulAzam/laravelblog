@extends('layout.main')

@section('title', 'Create Category')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Create Category</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
@if(!empty($errors->all()))
	<div class="alert alert-warning" role="alert">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
{!! Form::open(['route' => 'categories.store', 'class' => 'form']) !!}
    <div class="form-group"> 
      {!! Form::label('name') !!}
      {!! Form::text('name', null, ['required', 'class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
@stop