<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Добавить комментарий</button>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="nav-item">ID: {{ $topic->id }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br> 
<div class="row justify-content-center">
    <div class="col-md-12">
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
</div><br>                   
                         