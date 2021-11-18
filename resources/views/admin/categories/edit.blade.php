@extends('layouts.main')
@section('title')
    @parent Admin Edit Category
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Edit Category</h1>
                @include('inc.message')
                <form method="post" action="{{route('admin.categories.update', ['category'=>$category])}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"
                                  class="form-control">{!! $category->description !!}</textarea>
                    </div>
                    <br/>
                    <div class=" form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Edit Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@push('js')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>
@endpush