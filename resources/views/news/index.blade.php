@extends('layouts.main')
@section('title')
    @parent All News
@endsection
@include('partials.header')
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">News</h1>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($newsList as $news)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>

                            <div class="card-body">
                                <a href="news/{{$news->id}}">{{$news->title}}</a>
                                <p>{{$news->short_description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted col-4">Author: {{$news->author->first_name}} {{$news->author->name}}</small>
                                    <small class="text-muted">Categorry: {{$news->category->name}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>