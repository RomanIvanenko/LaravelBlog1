@extends('layouts.app')


@section('content')
<h2>Добавить пост</h2>

<form action="/post" method="post">
   {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        
        <div class="form-group">
            <label for="alias">Alias:</label>
            <input class="form-control" type="text" name="alias" id="alias">
        </div>
        
         <div class="form-group">
            <label for="slug">Slug:</label>
            <textarea class="form-control" type="text" name="slug" id="slug"></textarea>
        </div>
   
        <div class="form-group">
            <label for="video">YouTubeVideo:</label>
            <textarea class="form-control" type="text" name="video" id="video"></textarea>
        </div>
        
         <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" type="text" name="body" id="body"></textarea>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Опубликовать</button>
        </div>
    @include('layouts.error')
   
     </form>
@endsection 