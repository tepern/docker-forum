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
        <div class="row justify-content-center">
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