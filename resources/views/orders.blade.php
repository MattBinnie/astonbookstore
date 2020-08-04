@extends('layouts.master')

@section('title')
    Orders
@endsection

@section('content')    
    <div class="panel-body"> 
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Time Created</th>
                        <th>User Id</th>
                        <th>Ordered Books</th>
                        <th>Email</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }} </td>
                        <td>{{ $order->created_at }} </td>
                        <td>{{ $order->user_id }} </td>
                        <td>
                        @foreach ($order->cart->books as $book)
                            {{ $book['book']['book_title'] }} x {{ $book['qty'] }} <br>
                        @endforeach
                        </td>
                        <td>{{ $order->email }} </td>
                    <td> £{{ $order->cart->totalPrice }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection