<?php

namespace App\Http\Controllers;
use App\Model\Cart;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Session;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $category_controller = null;
    public $cart_controller = null;
    public function __construct()
    {
        $this->category_controller = $this->getDataMenu();
        if(\Illuminate\Support\Facades\Session::has('user')) {
            $this->cart_controller = $this->getCart();
        }
    }
    public function getDataMenu()
    {
        $categories = Category::where('cat_active',1)->get();
        $categories_parent = $categories->where('cat_parent_id',0);
            $products_main = $categories_parent->map(function($parent) use($categories){
            $parent->childs = $categories->where('cat_parent_id',$parent->cat_id);
            $childs_id =  $parent->childs->map(function($cat){
                return $cat->cat_id;
            })->toArray();
            if(count($childs_id)==0) return null;
            return $parent;
        });
        $categories_parent = $categories_parent->filter(function($item){
            return $item != null &&count($item->childs) >0;
        });
//        dd($categories_parent);
        return $categories_parent;
    }
    public function getCart()
    {
        $user = Session::all();
        $cart = Cart::where('user_id',$user["user"]["id"])->get();
        return $cart;
    }


}
