@extends('layouts.main')
@section('title')
    @parent Admin New News
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Add news</h1>
                <form method="post" action="{{route('admin.news.update', ['news' => $news]}}">
                    @csrf
                    @method('put')
                    <div>
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{old('title')}}">
                    </div>
                    <div>
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description" class="form-control">{{old('short_description')}}</textarea>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div>
                        <label for=" author">Author</label>
                        <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
                        <label for=" category">category</label>
                        <select class="form-control" id="category" name="category">
                            <option>...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') === $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br/>
                    <div class=" form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Add News</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>