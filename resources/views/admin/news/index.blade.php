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
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">Author Id</th>
                        <th scope="col">Category Id</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsList as $news)
                        <tr>
                            <td>{{$news->id}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{$news->short_description}}</td>
                            <td>{{$news->author_id}}</td>
                            <td>{{$news->category_id}}</td>
                            <td>view</td>
                            <td>edit</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>