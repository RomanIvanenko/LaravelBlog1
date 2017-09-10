@extends('layouts.app')


@section('content')
<h2>Редактировать пост</h2>

<form action="/posts/{{$post->alias}}" method="post">
   {{csrf_field()}}
   {!! method_field('patch') !!}  
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
        </div>
        
        <div class="form-group">
            <label for="alias">Alias:</label>
            <input class="form-control" type="text" name="alias" id="alias" value="{{$post->alias}}">
        </div>
        
         <div class="form-group">
            <label for="slug">Slug:</label>
            <textarea class="form-control" type="text" name="slug" id="slug">{{$post->slug}}</textarea>
        </div>
        <div class="form-group">
            <label for="video">YouTubeVideo:</label>
            <textarea class="form-control" type="text" name="video" id="video">{{$post->video}}</textarea>
        </div>
        
         <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" type="text" name="body" id="body">{{$post->body}}</textarea>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Редактировать</button>
        </div>
    @include('layouts.error')
   
     </form>
@endsection 