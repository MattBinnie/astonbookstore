@extends('layouts.master')

@section('title')
    Add A Book
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Add a Book</h1>

            <form action="{{ route('book.addBook') }}" method="post">
                <div class="form-group">
                    <label for="Title">Book Title</label>
                    <input type="text" id="book_title" name="book_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" id="author" name="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea for="description" rows="5" cols="60" name="description" required>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="release_year">Release Year</label>
                    <input type="text" id="release_year" name="release_year" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="mainimage">Main Image</label>
                    <input type="text" id="mainimage" name="mainimage" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="secondimage">Second Image</label>
                    <input type="text" id="secondimage" name="secondimage" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price (£)</label>
                    <input type="text" id="price" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add book</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection