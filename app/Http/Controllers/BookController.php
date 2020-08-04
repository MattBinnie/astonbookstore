<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Book;
use App\Image;
use App\BookCategory;
use App\User;
use App\Cart;
use App\Order;
use Session;

class BookController extends Controller
{
    public function list() {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $books = Book::all();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
        else{
            $currentuser = null;
            $books = Book::all();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
    }

    public function listByTitleAZ() {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $books = Book::all();
            $books = Book::orderBy('book_title', 'asc')->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
        else{
            $currentuser = null;
            $books = Book::all();
            $books = Book::orderBy('book_title', 'asc')->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
    }

    public function listByTitleZA() {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $books = Book::all();
            $books = Book::orderBy('book_title', 'desc')->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
        else{
            $currentuser = null;
            $books = Book::all();
            $books = Book::orderBy('book_title', 'desc')->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
    }

    public function listByComputingCategory() {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $books = DB::table('books')
            ->join('book_categories', 'books.id', '=', 'book_categories.book_id')
            ->where('book_categories.category_id', '=', 1)
            ->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
        else{
            $currentuser = null;
            $books = DB::table('books')
            ->join('book_categories', 'books.id', '=', 'book_categories.book_id')
            ->where('book_categories.category_id', '=', 1)
            ->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
    }

    public function listByBusinessCategory() {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $books = DB::table('books')
            ->join('book_categories', 'books.id', '=', 'book_categories.book_id')
            ->where('book_categories.category_id', '=', 2)
            ->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser')); 
        }
        else{
            $currentuser = null;
            $books = DB::table('books')
            ->join('book_categories', 'books.id', '=', 'book_categories.book_id')
            ->where('book_categories.category_id', '=', 2)
            ->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
    }

    public function listByLanguageCategory() {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentuser = User::find($id);
            $books = DB::table('books')
            ->join('book_categories', 'books.id', '=', 'book_categories.book_id')
            ->where('book_categories.category_id', '=', 3)
            ->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
        else{
            $currentuser = null;
            $books = DB::table('books')
            ->join('book_categories', 'books.id', '=', 'book_categories.book_id')
            ->where('book_categories.category_id', '=', 3)
            ->get();
            $images = Image::all();
            return view('/index', compact('books','images','currentuser'));
        }
    }

    public function getMoreInfo($id) {
        $book = Book::find($id);
        $images = Image::all();

        return view('/moreinfo', compact('book','images'));
    }

    public function addStock($id) {
        DB::table('books')
            ->where('Id', $id)
            ->update([
                'stock' => DB::raw('stock + 1'),
            ]);
        return redirect()->back();
    }

    public function getAddToCart(Request $request, $id){
        $book = Book::find($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($cart);
        $cart->add($book, $book->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('/shoppingcart');
        }
        $cart = Session::get('cart');
        $newCart = new Cart($cart);
        return view('/shoppingcart', ['books' => $cart->books, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
        if(!Session::has('cart')){
            return view('/shoppingcart');
        }
        $cart = Session::get('cart');
        $newCart = new Cart($cart);
        $total = $newCart->totalPrice;
        return view('/checkout', ['total' => $total]);
    }

    public function checkout() {
        $cart = Session::get('cart');

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->email = Auth::user()->email;
        $order->cart = serialize($cart);

        $order->save();

        Session::forget('cart');
        return redirect()->route('book.list')->with('success', 'Successfully purchased!');
    }

    public function removeAll($id){
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $newCart = new Cart($cart);
        $newCart->removeAll($id);

        if(count($newCart ->books) > 0){
            Session::put('cart', $newCart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('book.shoppingcart');
    }

    public function getAddABook(){
        return view('/addbook');
    }

    public function postAddABook(Request $request){
        $image = new Image();
        $image->url = $request->input('mainimage');
        $image->save();

        if($request->input('secondimage') != null){

            $secondImage = new Image();
            $secondImage->url = $request->input('secondimage');
            $secondImage->save();
        }
        $book = new Book();
        $book->book_title = $request->input('book_title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->release_year = $request->input('release_year');
        $book->price = $request->input('price');
        $book->stock = $request->input('stock');
        
        $images = Image::all();
        foreach($images as $image){
            if($image->url == $request->input('mainimage')){
                $book->image1_id = $image->id;
            }
            elseif($image->url == $request->input('secondimage')){
                $book->image2_id = $image->id;
            }
        }

        $book->save();
        return redirect()->route('book.list')->with('success', 'Successfully added book!');
    }
}
