@extends('layouts.app')


@section('content')
    <div class="row">
    @foreach($posts as $post)
    
        <div class="col-md-3">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->slug }}</p>
            <p><a href="/posts/{{$post->alias}}" class="btn btn-default">Читать далее</a></p>
            @if(Auth::user()->id == DB::table('posts')->where('alias',$post['alias'])->value('user_id'))
            <p><a href="/posts/{{$post->alias}}/edit" class="btn btn-primary">Редактировать</a></p>
            <form action="/posts/{{$post->alias}}" method="post">
                {{csrf_field()}}
                {!! method_field('delete') !!}
                <button type="submit" class="btn btn-danger">Delete</button>                
            </form>
            @endif
        </div>
    
    @endforeach
    </div>
@endsection