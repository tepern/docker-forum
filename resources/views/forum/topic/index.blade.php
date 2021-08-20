@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('forum.topic.index') }}">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Topics</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    @if(auth()->check())
                    <a class="btn btn-primary" href="{{ route('forum.topic.create') }}">Добавить</a>
                    @endif
                </nav>
            </div>    
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Тема</th>
                                <th>Ответов</th>
                                <th>Просмотров</th>
                                <th>Автор</th>
                            </tr>
                        </thead>
                        @foreach($paginatorTopic as $topic)
                            @php /** @var \App\Models\Topic $topic */ @endphp
                            <tr>
                                <td>{{ $topic->id }}</td>
                                <td>
                                <a href="{{ route('forum.topic.show', $topic->slug) }}">{{ $topic->title }}</a>
                                </td>
                                <td>
                                {{ $topic->comments->count() }}
                                </td>
                                <td>
                                {{ $topic->view_count }}
                                </td>
                                <td>
                                {{ $topic->user->name }}
                                </td>
                            </tr>
                        @endforeach    
                    </table>
                </div>    
            </div>
        </div>
        @if($paginatorTopic->total() > $paginatorTopic->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="cart-body">
                            {{ $paginatorTopic->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif    
    </div> 
@endsection