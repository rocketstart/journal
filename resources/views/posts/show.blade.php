@extends('layouts.app')

@section('title', $post->title)
@section('page-meta-description', strip_tags($post->short_description))
@section('heading', $post->title)
@section('sub-heading', $post->user->name)
@section('cover_image', $post->cover_image)

@section('content')
    <div id="show-post" class="container">
        <p>{!! $post->body !!}</p>

        <hr>

        <div class="row">
            <div class="col-xs-4">
                <div class="text-left">{{ $post->user->name }}</div>
            </div>
            <div class="col-xs-4">
                @if($post->owner($post))
                    <div class="text-center"><a href="{{ route('posts.edit', $post->id) }}"><em class="fa fa-pencil"></em> Edit</a></div>
                @endif
            </div>
            <div class="col-xs-4">
                <div class="text-right">{{ $post->created_at->format('d. M Y') }}</div>
            </div>
        </div>

    </div>
@endsection