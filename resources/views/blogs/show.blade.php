@extends('layout.main')

@section('title', 'Blog Page')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/post-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{ $blog->title }}</h1>
                    <h2 class="subheading">{{ $blog->excerpt }}</h2>
                    <span class="meta">Posted by <a href="#">{{ $blog->user->name }}</a> on {{ $blog->published_at }}</span>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        {!! $blog->content !!}
    </div>
</div>
@stop