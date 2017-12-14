@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        @foreach ($posts as $post)
            <h3><a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br></a></h3>
            <p class="blog-post-meta">by <a href="mailto:{{$post->email}}">{{$post->author}}</a> | {{$post->created_at->diffForHumans()}} | <a href="https://www.google.com/search?q={{$post->title}}">web</a> </p>
        @endforeach
        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </div>
    @include ('sidebar')
@endsection
