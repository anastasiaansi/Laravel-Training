@extends('layouts.main')
@section('title')
    @parent Admin Edit User
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Edit Category</h1>
                @include('inc.message')
                <form method="post" action="{{route('admin.user.update', ['user'=>$user])}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email"
                               class="form-control" value="{{$user->email }}"/>
                    </div>
                    <div class="form-group">
                        <label for="is_admin">Admin
                            <input type="hidden" name="is_admin" value="0"/>
                            <input id="is_admin" name="is_admin" type="checkbox" value="1"
                                    {{ $user->is_admin ? 'checked' : ''}} />
                        </label>
                    </div>
                    <br/>
                    <div class=" form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Edit User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>