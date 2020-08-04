@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <h1> Shopping Customer </h1>
        <div class="panel-body"> 
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><strong>{{ $book['book']['book_title']}}</strong></td>
                            <td>{{ $book['qty']}}</td>
                            <td>{{ $book['price']}}</td>
                            <td><a class="danger" href='{{ route('book.removeAll', ['id' => $book['book']['id']]) }}'>Remove All</a></td>

                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="4" class="text-right"><strong>Total</strong></td>
                            <td>{{ $totalPrice }} </td>
                        </tr>
                </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('book.list')}}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
        <a href="{{ route('checkout')}}" class="btn btn-primary pull-right">Checkout<span class="glyphicon glyphicon-chevron-right"></span></a>
    @else
        <h2> Shopping Cart Empty </h2>
        <a href="{{ route('book.list')}}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
    @endif
@endsection