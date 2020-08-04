@extends('layouts.master')

@section('title')
    Book Store
@endsection

@section('content')
  @if(Session::has('success'))
    <div class = "row">
        <div class="col-sm-12 pt-4">
            <div id="paymentMessage" class="alert alert-success text-center">
              {{ Session::get('success') }}
            </div>
        </div>
    </div>
  @endif
  <div class="container py-5">
    <div class="row text-center mb-5">
        <div class="col-lg-7 mx-auto">
            @if(Auth::check())
              @if($currentuser->isAdmin)
              <h1 class="display-4">Admin Account</h1>
              @endif
            @endif
            <h1 class="display-4">Book List</h1>
        </div>
    </div>
    <div class="dropdown show">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort By
      </a>
        @if(Auth::check())
          @if($currentuser->isAdmin)
            <div class="pt-4">
              <h3>Admin Options:</h3> <a href="{{ route('orders') }}">Check User Orders<br></a> <a href="{{ route('book.addBook') }}"> Add a Book</a>
            </div>  
          @endif
        @endif
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('book.listByTitleAZ')}}">Title A - Z</a>
        <a class="dropdown-item" href="{{ route('book.listByTitleZA')}}">Title Z - A</a> 
        <a class="dropdown-item" href="{{ route('book.listByComputingCategory')}}">Category: Computing</a>
        <a class="dropdown-item" href="{{ route('book.listByBusinessCategory')}}">Category: Business</a>
        <a class="dropdown-item" href="{{ route('book.listByLanguageCategory')}}">Category: Languages</a>
      </div>
    </div>
    @foreach ($books as $book)
      <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$book->book_title}}</h5>
                            <p class="font-italic text-muted mb-0 small">{{$book->description}}</p>
                            <h6 class="font-weight-bold my-2">Stock: {{$book->stock}}</h6>
                            @if(Auth::check())
                              @if($currentuser->isAdmin)
                                <a class="fas fa-plus btn" href= {{ url('addStock/'.$book->id) }}> Add 1 to Stock </a>
                              @endif
                            @endif
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="font-weight-bold my-2">£{{$book->price}}</h6>
                            </div>
                            <div class="mt-4">
                              <a class="mr-4 btn" href= {{ url('moreinfo/'.$book->id) }} >More Info</a>
                              @if(Auth::check())
                                <a class="btn-success btn" href={{ route('book.addToCart', ['id' => $book->id])}}>Add to Cart <i class="fas fa-cart-plus"></i></a>
                              @else
                                <a class="btn-success btn" href="{{ route('user.signin') }}">Add to Cart <i class="fas fa-cart-plus"></i></a>
                              @endif
                            </div>
                            @foreach ($images as $image)
                              @if($book->image1_id == $image->id)
                                </div><img src={{$image->url}} alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                              @endif
                            @endforeach
                    </div> <!-- End -->
                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>
    @endforeach
  </div>
@endsection
