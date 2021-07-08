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
                            <a class="nav-link" data-toggle="tab" href="#info" role="tab">Основные данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel"></div>
                        <div class="tab-pane" id="info" role="tabpanel">
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
            </div>
        </div>
    </div>
</div>
