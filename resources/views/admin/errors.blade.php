@if($errors->any())
    <div class="alert alert-danger">
        <div class="container">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ol>
            <div class="form">
                <a href="#yak1">Перейти к сообщению</a>
            </div>
        </div> 
    </div>
@endif
