@extends('layouts.main')
@section('title')
    @parent Admin New Category
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Add Category</h1>
                @include('inc.message')
                <form method="post" action="{{route('admin.categories.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"
                                  class="form-control">{!! old('description') !!}</textarea>
                    </div>
                    <br/>
                    <div class=" form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>