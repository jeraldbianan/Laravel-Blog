@extends('layouts.front')

@section('heading')
    <div class="post-heading">
        <h1>{{ $post->title }}</h1>
        <span class="meta">Posted by
            <a href="#">{{ $post->user->name }}</a>
            - {{ $post->created_at->format('M d, Y') }}
        </span>
    </div>
@endsection

@section('content')
    <article>
        {{ $post->body }}
    </article>
@endsection
