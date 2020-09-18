<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends Controller
{
    // list domains
    public function index($slug,$id)
    {
        $link = '/' . $slug . '-p' . $id . ".html";
//        $objController = new Controller();
//        $Categories = $objController->getDataMenu();
        $Categories = $this->category_controller;
        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            $cart = $this->cart_controller;
        }
        $inforProduct = Product::where('pro_link', $link)->first();
        $Categories = $Categories->toArray();
        foreach ($Categories as $value) {
            if ($value["cat_id"] == $inforProduct["pro_cat_root_id"]) {
                foreach ($value["childs"] as $child) {
                    if ($child["cat_id"] == $inforProduct["pro_cat_id"]) {

                        if(\Illuminate\Support\Facades\Session::has('user'))
                        {
                            return view("HTML.DetailProduct", ["categoryParent" => $Categories, "inforProduct" => $inforProduct, "inforCategoryParent" => $value, "inforCategory" => $child,"cart"=>$cart]);
                        }
                        else
                        {
                            return view("HTML.DetailProduct", ["categoryParent" => $Categories, "inforProduct" => $inforProduct, "inforCategoryParent" => $value, "inforCategory" => $child]);
                        }


                    }
                }
            }
        }
        return view('erorrs.404');
    }
    public function create(){} // show create form
    public function store(Request $request){ } // handle the form POST
    public function show($id){} // show a single domain
    public function edit($id){} // show edit page
    public function update(Request $request, $id){} // handle show edit page POST
    public function destroy($id){} // delete a domain
    public function addcart(Request $request)
    {
        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            $data = $request->all();
            $pro_id = $data["masanpham"];
            $pro_number = $data["number"];
            $objController = new Controller();
            $cart = $objController->getCart();
//        dd($cart->toArray());
            $cart = $cart->toArray();
            foreach ($cart as $value) {
                if ($value['pro_id'] == $pro_id) {
                    $pro_number = $pro_number + $value['quantity'];
                    Cart::where('pro_id', $pro_id)->update(['quantity' => $pro_number]);
                    return 2;
                }
            }
            $user = Session::all();
            $user_id = $user["user"]["id"];
            Cart::create([
                'user_id' => $user_id,
                'pro_id' => $pro_id,
                'quantity' => $pro_number
            ]);
            return true;
        }
        else
        {
            return false;
        }



    }

}

