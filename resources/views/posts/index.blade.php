@extends('layouts.app')
@section('content')
    <div class="col-md-8 blog-main">
        @foreach ($posts as $post)
                <h2><a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br></a></h2>
                <p class="teaser">
                   {!!  CloseTags(str_limit($post->body,800)) !!} {{-- Limit teaser to 400 characters --}}
                </p>
                <hr />
        @endforeach
    </div>
    <div class="text-center">
        {!! $posts->links() !!}
    </div>
    @include ('sidebar')
@endsection
