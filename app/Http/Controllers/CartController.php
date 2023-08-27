<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        $user = Auth::user();
       // $province = Cart::with(['indoregion.provinces', 'name'])->where('users_id', Auth::user()->id)->get();
        // var_dump($user->email);
        // die;
        return view('pages.cart',[
            'carts' => $carts,
            'user' => $user,
           // 'provinces' => $province

        ]);
        
    }

    public function delete(Request $request, $id)
    {
       
        // $cart = Cart::findOrFail($id);
        $cart=Cart::where('id',$id);
        
        $cart->delete();

        return redirect()->route('cart');
    }
    
    public function success()
    {
        return view('pages.success');
    }
}
