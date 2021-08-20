@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Topic $topic */
    @endphp
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('forum.topic.index') }}">Forum</a></li>
                <li class="breadcrumb-item"><a href="{{ route('forum.topic.index') }}">Topics</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $topic->title }}</li>
            </ol>
        </nav>
        @php
        /** @var \Illuminate\Support\ViewErrorBag $errors */
        @endphp
        @if($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                            {{ $errors->first() }}
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if(session('success'))
            <div class="row justify-content-center">
                <div class="row-md-11">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                            {{ session()->get('success') }}
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    @if(auth()->check())
                    <a class="btn btn-primary" href="{{ route('forum.comment.create', ['topic_id' => $topic->id]) }}">Добавить</a>
                    @endif
                </nav>
            </div>
            <div class="col-md-11 col-xs-12">
                @include('forum.topic.includes.topic_show_main_col')
            </div>
            {{-- 
            <div class="col-md-3">
                @include('forum.topic.includes.topic_show_add_col')
            </div>
            --}}
        </div>
    </div>
@endsection