@extends('layouts.app')


@section('content')
<div class="row">

        <div class="col-sm-12 blog-main" align="center">

          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <h3>{{$post->name}}</h3>
            <p class="blog-post-meta">{{$post->slug}}</p>            
               @if($post['video'])
               <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$post->video}}" frameborder="0" allowfullscreen></iframe>
               @endif
            <p>{{$post->body}}</p>
            <hr>
          </div>
    </div>
</div>
<hr />
<form action="/addcomment/{{$post->alias}}" method="post">
                {{csrf_field()}}
    <div class="form-group">
        <label for="text_comment">Ваш комментарий:</label>
        <textarea class="form-control" type="text" name="text_comment" id="text_comment"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Добавить комментарий</button>
</form>
    @foreach($post['comment'] as $comment)
        <div class="col-md-12">
            <h4>{{ $comment->user_name }}</h4>
            <p>{{ $comment->text_comment }}</p>
        </div>
        @if(Auth::user()->name == $comment->user_name )
            <form action="/comment/{{$comment->id}}" method="post">
                    {{csrf_field()}}
                    {!! method_field('delete') !!}
                    <button type="submit" class="btn btn-danger" >Delete</button>                
            </form>
        @endif
    <br><hr/><br>
    @endforeach  
    
@endsection
