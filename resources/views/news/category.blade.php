@extends('layouts.main')
@section('title')
    @parent Categorie
@endsection
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">

                @foreach($news as $news)
                    @if ($loop->first)
                        <h1>
                            {{$news->category->name}}
                        </h1>
                    @endif

                    <a href="news/{{$news->id}}">{{$news->title}}</a>
                    <p>{{$news->short_description}}</p>
                    <div>Author: Author: {{$news->author->first_name}} {{$news->author->name}}</div>
            </div>
            @endforeach
        </div>
    </section>
</main>