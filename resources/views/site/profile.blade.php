@extends('layouts.site')

@section('title', 'Профиль пользователя')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр"Костюковка-Спорт"')

@section('content')
  <div class="leave-comment mr0"><!--leave comment-->
    <h3 class="text-uppercase">Мой профиль</h3>
    <img src="{{$user->getImage()}}" alt="" class="text-center mb-2 img-fluid rounded mx-auto d-block">

    @if(isset($user))
      <!-- Default form contact -->
      <form class="p-0" method="post" action="/profile" enctype="multipart/form-data">
        {{csrf_field()}}

        <!-- Name -->
        <label for="Name">Имя</label>
        <input type="text" id="Name" class="form-control mb-4" name="name" value="{{$user->name}}">

         <!-- Message -->
         <label for="Description">Описание</label>
        <div class="form-group">
          <textarea id="Description" class="form-control rounded-0" rows="3" name="description">{!!$user->description!!}</textarea>
        </div>

        <!-- Email -->
        <label for="Email">Email</label>
        <input type="email" id="Email" class="form-control mb-4" name="email" value="{{$user->email}}">


        <!-- Password -->
        <label for="Password">Пароль</label>
        <input type="password" id="Password" class="form-control mb-4" name="password" placeholder="Новый пароль (не обязательно)">

        <div class="form-group mb-4">
          <input type="file" class="" name="avatar">
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Обновить</button>

      </form>
      <!-- Default form contact -->
    @endif

  </div><!--end leave comment-->
@endsection