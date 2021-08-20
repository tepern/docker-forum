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
                                <textarea name="content" id="content" class="form-control" rows="3">{{ old('content', $comment->content) }}</textarea>    
                            </div>
                            <div class="form-check">
                                <input name="is_published" 
                                       type="hidden"
                                       value="0"
                                >
                                <input name="is_published" 
                                       type="checkbox" 
                                       class="form-check-input" 
                                       value="1"
                                       @if($comment->is_published)checked="checked"@endif
                                >
                                <label class="form-check-label" for="is_published">Опубликовано</label>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
