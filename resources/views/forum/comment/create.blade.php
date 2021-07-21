@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Comment $comment */
    @endphp

    <form method="POST" action="{{ route('forum.comment.store') }}">
        @csrf
        <div class="container">
            @php
            /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close float-none" data-dismiss="alert" aria-label="Close">
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
                            <button type="button" class="close float-none" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                                {{ session()->get('success') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('forum.comment.includes.comment_create_main_col')
                </div>
                <div class="col-md-3">
                    @include('forum.comment.includes.comment_create_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection