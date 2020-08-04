<?php

namespace App;

class Cart{
    public $books = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($cart)
    {
        if($cart){
            $this->books = $cart->books;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    public function add($book, $id){
        $storedBook = ['qty' => 0, 'price' => $book->price, 'book' => $book];
        if($this->books) {
            if(array_key_exists($id, $this->books)) {
                $storedBook = $this->books[$id];
            }
        }
        $storedBook['qty']++;
        $storedBook['price'] = $book->price * $storedBook['qty'];
        $this->books[$id] = $storedBook;
        $this->totalQty++;
        $this->totalPrice += $book->price;
    }

    public function removeAll($id){
        $this->totalQty -= $this->books[$id]['qty'];
        $this->totalPrice -= $this->books[$id]['price'];
        unset($this->books[$id]);
    }
}