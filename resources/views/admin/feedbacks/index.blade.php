@extends('layouts.main')
@section('title')
    @parent Account Index
@endsection

<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar></x-admin.sidebar>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Account</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('admin.feedback.create') }}" type="button" class="btn btn-sm">
                        Add Feedback
                    </a>
                </div>
            </div>
            <h2>Feedback Liste</h2>
            <div class="table-responsive">
                @include('inc.message')
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{$feedback->name}}</td>
                            <td>{{$feedback->feedback}}</td>
                            <td>
                                <form method="post" action="{{route('admin.feedback.destroy',$feedback->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </main>
    </div>
</div>