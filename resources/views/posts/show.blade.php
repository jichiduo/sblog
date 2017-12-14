@extends('layouts.app')

@section('title', '| View Post')

@section('content')

<div class="col-md-8 blog-main">

  <div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <!-- <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> -->
    <hr>
    <p class="lead">{!! $post->body !!} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('edit post')
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('delete post')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}
  </div><!-- /.blog-post -->

</div>

@include ('sidebar') 

@endsection