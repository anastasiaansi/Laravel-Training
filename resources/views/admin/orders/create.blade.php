@extends('layouts.main')
@section('title')
    @parent Order
@endsection

<div class="container-fluid">
    <div class="row">
        <main class="col-6">
            @include('inc.message')
            <form action="{{ route('admin.order.store') }}"  method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please get you Order</h1>

                <div class="form-floating">
                    <input type="input" class="form-control" id="name" name="name" value="{{old('name')}}">
                    <label for="name">Name</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="input" class="form-control" id="phone" name="phone"  value="{{old('phone')}}">
                    <label for="phone">Phone</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}">
                    <label for="email">Email</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="input" class="form-control" id="info" name="info" value="{{old('info')}}">
                    <label for="info">Info</label>
                </div>
                <br>
                <button class="btn btn-lg btn-primary" type="submit">Send</button>
            </form>
        </main>
    </div>
</div>