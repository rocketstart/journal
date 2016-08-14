@extends('layouts.app')

@section('title', 'New Story')

@section('content')
    <div class="Post__Create">

        <form action="{{ route('posts.store') }}" method="post">{{ csrf_field() }}

            <header class="intro-header" style="background-image: url(@yield('cover_image', $image->url))">

                <input type="text" class="hidden" name="cover_image" value="{{ $image->url }}">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="site-heading">
                                <input type="text" name="title" class="form-control form-title" placeholder="What's on your mind?"
                                       autocomplete="off" autofocus value="{{ old('title') }}">
                                <hr class="small">
                                <span class="subheading">{{ auth()->user()->name }}</span>
                                <em class="fa-"></em>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="create-post" class="container">

                <div class="form-group">
                </div>
                <textarea class="editable" name="body" required></textarea>

                <hr>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="text-left">
                            <button class="btn btn-primary" name="save"><em class="fa fa-save"></em></button>
                        </div>

                    </div>
                    <div class="col-xs-6">
                        <div class="text-right">
                            <button class="btn btn-success" name="publish"><em class="fa fa-send"></em></button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection