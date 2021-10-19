@extends('layouts.main')
@section('title')
    @parent Feedback Account
@endsection

<div class="container-fluid">
    <div class="row">
        <main class="col-6">
            @include('inc.message')
            <form action="{{ route('account.feedback.store') }}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please get you Feedback</h1>

                <div class="form-floating">
                    <input type="input" class="form-control" name="name" id="name" value="{{old('name')}}">
                    <label for="name">Name</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="input" class="form-control" id="feedback" name="feedback" value="{{old('feedback')}}">
                    <label for="feedback">Feedback</label>
                </div>
                <br>
                <button class="btn btn-lg btn-primary" type="submit">Send</button>
            </form>
        </main>
    </div>
</div>