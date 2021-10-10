@extends('layouts.main')
<form action="{{ route('admin.create') }}">
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Text Field</label>
        <div class="col-8">
                <input id="text" name="text" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Text Field</label>
        <div class="col-8">
            <input id="text1" name="text1" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <input name="checkbox" id="checkbox_0" type="checkbox" checked="checked" class="custom-control-input"
               value="rabbit">
        <label for="checkbox_0" class="custom-control-label">Запомнить меня</label>

    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>