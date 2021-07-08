@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('forum.topic.create') }}">Добавить</a>
                </nav>
            </div>    
            <div class="card">
                <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Тема</th>
                            <th>Автор</th>
                        </tr>
                    </thead>
                    @foreach($paginatorTopic as $topic)
                        @php /** @var \App\Models\Topic $topic */ @endphp
                        <tr>
                            <td>{{ $topic->id }}</td>
                            <td>
                            <a href="{{ route('forum.topic.show', $topic->id) }}">{{ $topic->title }}</a>
                            </td>
                            <td>
                               {{ $topic->user_id }}
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