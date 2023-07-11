<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function show_shop_page(){
        return view('shop.shop_page');
    }

    public function show_item($id){

        $article = Articles::where('id', $id)->firstOrFail();

        return view('shop.item', ['article' => $article]);
    }
}
