@extends('layouts.main')

@foreach($news as $news)
    <div>
        <h2>
            <a href="news/{{$news->id}}">{{$news->title}}</a>
        </h2>
        <p>{{$news->short_description}}</p>
        <div>Author: {{$news->author_id}}</div>
        <div>Categorry: {{$news->category_id}}</div>
    </div>
@endforeach