@extends('layouts.main')
@section('title')
    @parent Admin New News
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Edit news</h1>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form method="post" action="{{route('admin.news.update', ['news' => $news])}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $news->title }}">
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description"
                                  class="form-control"> {{ $news->short_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"
                                  class="form-control">{{ $news->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for=" author">Author</label>
                        <select class="form-control" id="author" name="author_id">
                            <option>...</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}"
                                        @if($news->author_id === $author->id) selected @endif>
                                    {{ $author->first_name }} {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                            <option @if($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                            <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">category</label>
                        <select class="form-control" id="category" name="category_id">
                            <option>...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($news->category_id === $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br/>
                    <div class=" form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Edit News</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>