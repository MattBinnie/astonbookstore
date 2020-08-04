@extends('layouts.master')

@section('title')
    {{ $book->book_title }}
@endsection

@section('content')
<div class="container">

    <h1 class="my-4">{{ $book->book_title }} </h1>
  
    <div class="row">
  
      <div class="col-md-8">
        @foreach ($images as $image)
            @if($book->image1_id == $image->id)
                <img class="img-fluid" src={{$image->url}} alt="Generic placeholder image">
            @endif
        @endforeach
      </div>
  
      <div class="col-md-4 mt-4">
        <h3 class="my-3">Description</h3>
        <p>{{ $book->description }} </p>
        <h3 class="my-3">Author</h3>
        <p>{{ $book->author }} </p>
        <h3 class="my-3">Release Year</h3>
        <p>{{ $book->release_year }} </p>
        <h3 class="my-3">Purchase Details</h3>
        <ul>
          <li>£ {{ $book->price }}</li>
          <li>Stock: {{ $book->stock }}</li>
        </ul>
        @if(Auth::check())
            <a class="btn-success btn" href={{ route('book.addToCart', ['id' => $book->id])}}>Add to Cart <i class="fas fa-cart-plus"></i></a>
        @else
            <a class="btn-success btn" href="{{ route('user.signin') }}">Add to Cart <i class="fas fa-cart-plus"></i></a>
        @endif
      </div>
  
    </div>

    @if($book->image2_id != null)
        <h3 class="my-4">Other Images: </h3>
    @endif
    <div class="row">
  
      <div class="col-md-3 col-sm-6 mb-4">
        @foreach ($images as $image)
            @if($book->image2_id == $image->id)
                <img src={{$image->url}} alt="Generic placeholder image" width="200" class="mt-6">
            @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection