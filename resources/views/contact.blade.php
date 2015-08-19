@extends('layout.main')

@section('title', 'Contact Page')

@section('header')
<header class="intro-header" style="background-image: url('{{ url('img/contact-bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <hr class="small">
                    <span class="subheading">Have questions? I have answers (maybe).</span>
                </div>
            </div>
        </div>
    </div>
</header>
@stop

@section('main-content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        {!! Form::open(['route' => 'contact_send', 'class' => 'contactForm']) !!}
        <div class="form-group col-xs-12 floating-label-form-group controls">
            {!! Form::label('Your Name') !!}
            {!! Form::text('name', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Your name')) !!}
        </div>
        <div class="form-group col-xs-12 floating-label-form-group controls">
            {!! Form::label('Your E-mail Address') !!}
            {!! Form::text('email', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Your e-mail address')) !!}
        </div>
        <div class="form-group col-xs-12 floating-label-form-group controls">
            {!! Form::label('Your Message') !!}
            {!! Form::textarea('message', null,
                array('required',
                'class'=>'form-control',
                'placeholder'=>'Your message')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Send', array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
@stop