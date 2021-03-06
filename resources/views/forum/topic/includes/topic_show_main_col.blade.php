@php
    /** @var \App\Models\Topic $topic */
    /** @var \Illuminate\Support\Collection $commentList */
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="cart-title mb-5">
                        <h3>{{ $topic->title }}</h3>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Комментарии</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info" role="tab">Информация о теме</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <table class="table border">
                                @foreach ($commentList as $comment)
                                    @php /** @var \App\Models\Comment $comment */ @endphp
                                        @if ($comment->is_published || Auth::id() == $comment->user_id)
                                            <tr>
                                                <th rowspan="2" class="border border-warning">{{ $comment->user->name }}</th>
                                                <th class="table-warning">{{ $comment->published_at }}</th>
                                                <th class="table-warning">
                                                    # {{ $comment->id }}
                                                    @if (Auth::id() == $comment->user_id)
                                                        <div class="float-right">
                                                            <a class="btn btn-outline-primary" href="{{ route('forum.comment.edit', $comment->id) }}">Edit</a>
                                                        </div>
                                                    @endif
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan="2">{!! $comment->content !!}</td>
                                            </tr>
                                        @endif 
                                @endforeach
                            </table>    
                        </div>
                        <div class="tab-pane" id="info" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <p>Идентификатор</p>
                                                <p>{{ $topic->slug }}</p>
                                            </div>
                                            <div class="form-group">
                                                <p>Автор</p>
                                                <p>{{ $topic->user->name }}</p>             
                                            </div>
                                            <div class="form-group">
                                                <p>Описание</p>
                                                <div>
                                                    {{ $topic->description }}
                                                </div>    
                                            </div>
                                        </div> 
                                    </div>       
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="card">
                                        <div class="card-body">               
                                            <div>
                                                <p>Создано</p>
                                                <p>{{ $topic->created_at }}</p>
                                            </div>
                                            <div>
                                                <p>Изменено</p>
                                                <p>{{ $topic->updated_at }}</p>
                                            </div>
                                            <div>
                                                <p>Удалено</p>
                                                <p>{{ $topic->deleted_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
