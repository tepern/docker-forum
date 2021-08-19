@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Comment $comment */
    @endphp

    <form method="POST" action="{{ route('forum.comment.update', $comment->id) }}">
        @method('PATCH')
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
    @if($comment->exists)
    <div class="container">
        <br>
        <form method="POST" action="{{ route('forum.comment.destroy', $comment->id) }}">
            @method('DELETE')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="container">
                        <div class="card">
                            <div class="card-body ml-auto">
                                <button type="submit" class="btn btn-outline-secondary">Удалить</button>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>     
    @endif
@endsection