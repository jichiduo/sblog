@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        @foreach ($posts as $post)
            <h4><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br></a></h4>
            <p class="blog-post-meta">by <a href="mailto:{{$post->email}}">{{$post->author}}</a> | {{$post->created_at->diffForHumans()}} | <a href="https://www.google.com/search?q={{$post->title}}">web</a> </p>
        @endforeach
        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </div>
    @include ('sidebar')
@endsection
