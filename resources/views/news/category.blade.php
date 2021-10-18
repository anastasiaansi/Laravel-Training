@extends('layouts.main')
@section('title')
    @parent Categorie
@endsection
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                @foreach($news as $news)
                    <h1>
                        <a href="news/{{$news->id}}">{{$news->title}}</a>
                    </h1>
                    <p>{{$news->short_description}}</p>
                    <div>Author: {{$news->author_id}}</div>
                    <div>Categorry: {{$news->category_id}}</div>
            </div>
            @endforeach
        </div>
    </section>
</main>