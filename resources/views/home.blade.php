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
                                    {{ $post->user->name }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach

            <!-- Pager -->
                @if($posts->count() > 10)
                    <div class="text-center">
                        {{ $posts->render() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
