@extends('layouts.main')
@section('title')
    @parent Admin Index
@endsection
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar></x-admin.sidebar>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm">
                        Add news
                    </a>
                </div>
            </div>
            <h2>Section title</h2>
            <div class="table-responsive">
                @include('inc.message')
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsList as $news)
                        <tr>
                            <td>{{$news->id}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{$news->short_description}}</td>
                            <td>{{$news->author->first_name}} {{$news->author->name}}</td>
                            <td>{{$news->category->name}}</td>
                            <td>{{$news->status}}</td>
                            <td><a href="{{ route('news.show', ['id'=>$news->id]) }}">view</a></td>
                            <td><a href="{{ route('admin.news.edit', ['news'=>$news->id]) }}">edit</a></td>
                            <td>
                                <form method="post" action="{{route('admin.news.destroy',$news->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $newsList->links() }}
            </div>
        </main>
    </div>
</div>