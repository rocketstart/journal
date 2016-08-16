@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="/story/{{ $post->created_at->format('Y-m-d') }}/{{ $post->permalink }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{!! $post->short_description !!}
                            </h3>
                        </a>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <span class="text-muted">{{ $post->user->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
            @endforeach

            <!-- Pager -->
                <div class="text-center">
                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
