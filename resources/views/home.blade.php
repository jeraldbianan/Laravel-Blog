@extends('layouts.front')

@section('content')
    @if ($posts->count())
        @foreach ($posts as $post)
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{ \Illuminate\Support\Str::words($post->body, 10, '...') }}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{ $post->user->name }}</a>
                    - {{ $post->created_at->format('M d, Y') }}
                </p>
            </div>
        @endforeach
        <hr>
    @else
        <div>No Posts..</div>
    @endif
    <!-- Pager -->
    @if ($posts->currentPage() === 1)
        <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
    @elseif (!$posts->hasMorePages())
        <a class="btn btn-primary float-left" href="{{ $posts->previousPageUrl() }}">&larr; Newer Posts</a>
    @else
        <a class="btn btn-primary float-left" href="{{ $posts->previousPageUrl() }}">&larr; Newer Posts</a>
        <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
    @endif

@endsection
