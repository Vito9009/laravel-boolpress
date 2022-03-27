@extends('layouts.app')

@section('content')
    <div class="container text-center my-5">
        <h1>{{$post->title}}</h1>
        <p>{{$post->content}}</p>
        <div>
            @if ($post->image)
                <img src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
            @endif
        </div>

        <div>
            <h3>Tag</h3>
            @foreach ($post->tags as $tag)
                <h6>{{$tag["name"]}}</h6>
            @endforeach
        </div>
        <a href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-secondary my-5">Torna alla home</button></a>
    </div>
@endsection