@extends('layout.main')

@section('title', 'Home Page')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <hr class="small">
                    <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @if(!empty($blogs)) 
            @foreach($blogs as $blog)
                <div class="post-preview">
                    <a href="{{ route('blogs.show', $blog->id) }}">
                        <h2 class="post-title">
                            {{ $blog->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $blog->excerpt }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">{{ $blog->user->name }}</a> on {{ $blog->published_at }}</p>
                </div>
            @endforeach
        @else
            <div>Nothing yet...</div>
        @endif
        <!-- Pager -->
        {!! $blogs->render() !!}
    </div>
</div>
@stop