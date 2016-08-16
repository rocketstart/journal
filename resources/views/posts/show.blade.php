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
            <div class="col-xs-6 col-sm-4">
                <div class="text-left"><span class="text-muted">{{ $post->user->name }}</span></div>
            </div>
            <div class="col-sm-4 hidden-xs">
                @if($post->owner($post))
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">

                        <button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em></button>

                    </form>
                @endif

                {{--@if($post->owner($post))--}}
                {{--<div class="text-center">--}}
                {{--<a href="{{ route('posts.edit', $post->id) }}" class="text-muted">--}}
                {{--<em class="fa fa-pencil"></em> Edit--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--@endif--}}
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="text-right"><span class="text-muted">{{ $post->created_at->format('d. M Y') }}</span></div>
            </div>
        </div>

    </div>
@endsection