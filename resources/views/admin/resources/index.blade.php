@extends('layouts.main')
@section('title')
    @parent resource #
@endsection
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Ressource</h1>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse($resources as $resource)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <a href="{{ $resource->link }}">{{ $resource->title }}</a>
                                {!! $resource->description !!}
                            </div>
                            @if(Auth::user()->is_admin)
                                <a href="{{route('admin.news.add', $resource->id)}}">Zu News hinzufügen</a>
                            @endif
                        </div>
                    </div>

                    @endforeach
            </div>
        </div>
    </div>

@endsection