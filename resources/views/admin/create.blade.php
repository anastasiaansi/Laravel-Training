@extends('layouts.main')
@section('title')
    @parent Admin New News
@endsection
<main>
    <section class="py-5 text-left container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>Add news</h1>
                <form>
                    <div>
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" class="form-control">
                    </div>
                    <div>
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" class="form-control">
                        <label for="category">category</label>
                        <input id="category" name="category" type="text" class="form-control">
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Add News</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>