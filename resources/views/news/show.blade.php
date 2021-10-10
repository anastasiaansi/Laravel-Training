@extends('layouts.main')
   <div>
      <h2>
        {{$news->title}}
      </h2>
      <p>{{$news->description}}</p>
      <div>{{$news->author}}</div>
      <a href="{{ route('news.index') }}">Back</a>
   </div>
