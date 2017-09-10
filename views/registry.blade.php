@extends('layouts.layout')


@section('content')
<h2>Регистрация</h2>

<form action="/registryUser" method="post">
   {{csrf_field()}}
        <div class="form-group">
            <label for="name">Login</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" name="password" id="password">
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Зарегестрироваться</button>
        </div>
    @include('layouts.error')
   
     </form>
@endsection 