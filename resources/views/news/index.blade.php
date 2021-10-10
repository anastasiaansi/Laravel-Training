@extends('layouts.main')
<div style="background: red;">
    @foreach($categories as $category)
        <h2>
            <a href="category/{{$category->id}}">{{$category->name}}</a>
        </h2>
    @endforeach
</div>
@foreach($newsList as $news)
    <div>
        <h2>
            <a href="news/{{$news->id}}">{{$news->title}}</a>
        </h2>
        <p>{{$news->short_description}}</p>
        <div>Author: {{$news->author_id}}</div>
        <div>Categorry: {{$news->category_id}}</div>
    </div>
@endforeach