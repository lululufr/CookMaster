<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Carts;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function show_shop_page()
    {

        $articles = Articles::paginate(20);


        return view('shop.shop_page')->with('articles', $articles);
    }
    
    public function show_item($id){

        $article = Articles::where('id', $id)->firstOrFail();

        return view('shop.item', ['article' => $article]);
    }

    public function add_item_cart($id){

        $cart = new Carts();
        $cart->user_id = auth()->user()->id;
        $cart->articles_id = $id;
        $cart->type = 'article';
        $cart->save();

        return redirect('/shop')->with('message', 'Article ajouté au panier');
    }

    public function show_cart(){

        $carts = Carts::where('user_id', auth()->user()->id)->get();

        return view('shop.cart')->with('carts', $carts);
    }
}
