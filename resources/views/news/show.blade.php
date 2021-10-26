@extends('layouts.main')
@section('title')
    @parent Show News Id #
@endsection

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>
                    {{$news->title}}
                </h1>
                <p>{{$news->description}}</p>
                <div>Auttor: {{$news->author->first_name}} {{$news->author->name}}</div>
                <div>Categorry: {{$news->category->name}}</div>
                <a href="{{ route('news.index') }}">Back</a>
            </div>
        </div>
    </section>
</main>