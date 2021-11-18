@extends('layouts.main')
@section('title')
    @parent Admin New News
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Add news</h1>
                @include('inc.message')
                <form method="post" action="{{route('admin.news.store')}}">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $resource->title }}">
                    </div>
                    <div>
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description"
                                  class="form-control">{{old('short_description')}}</textarea>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description"
                                  class="form-control">{{$resource->description }}</textarea>
                    </div>
                    <div>
                        <label for="author">Author</label>
                        <select class="form-control" id="author" name="author_id">
                            <option value="0">...</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}"
                                        @if(old('author') === $author->id) selected @endif>
                                    {{ $author->first_name }} {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="category">category</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="0">...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if(old('category') === $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                            <option @if(old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                            <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
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
@push('js')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('description', options);
    </script>

@endpush