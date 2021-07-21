@php
    /** @var \App\Models\Comment $comment */
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="cart-title">
                        <h3>Тема: <strong>{{ $comment->topic->title }}</strong></h3>
                        <input name="topic_id" value="{{ $comment->topic_id }}" hidden>
                    </div>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="content">Комментарий</label>
                                <textarea name="content" id="content" class="form-control" rows="3">
                                    {{ old('content', $comment->content) }}
                                </textarea>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
