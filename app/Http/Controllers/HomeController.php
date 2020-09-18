<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Lumen\Routing\Controller as BaseController;
use Elasticsearch\ClientBuilder;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
class HomeController extends Controller
{
    // list domains
    public function index(){
        $Categories = $this->category_controller;
        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            $cart = $this->getCart();
        }
        $products_new = Product::where('pro_active',1)->where('pro_new',1)->orderBy('pro_id','desc')->limit(6)->get();
        $id_pro_new = $products_new->map(function($item){
            return $item->pro_id;
        })->toArray();
        $products_main = $Categories->map(function($parent) use($Categories,$id_pro_new){
            $childs_id =  $parent->childs->map(function($cat){
                return $cat->cat_id;
            })->toArray();
            if(count($childs_id)==0) return null;
            $parent->products = Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->whereNotIn('pro_id',$id_pro_new)->whereIn('pro_cat_id',$childs_id)->where('pro_active',1)->orderBy('pro_id','desc')->limit(6)->get();
            if( $parent->products->count()==0) return null;
            return $parent;
        });

        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            return view('HTML.Home',['listProductNew'=>$products_new,'categoryParent'=>$products_main,'cart'=>$cart]);
        }
        else
        {
            return view('HTML.Home',['listProductNew'=>$products_new,'categoryParent'=>$products_main]);
        }

    }
    public function create(){} // show create form
    public function store(Request $request){ } // handle the form POST
    public function show($id){} // show a single domain
    public function edit($id){} // show edit page
//    public function update(Request $request, $id){} // handle show edit page POST
    public function destroy($id){} // delete a domain
    public function filterProductwithCategory(Request $request)
    {
        $data = $request->all();
        $idCategory = $data["idCategory"];
        $modelProduct = new Product();
        $listProduct = $modelProduct->filterProduct($idCategory)->toArray();
        return view('Ajax.show_productfilter')->with('listProduct', $listProduct);
    }
    public function viewSearch(Request $request)
    {

        $search = $request->keyword;
//        dd($search);
        if (isset($search))
        {
            $hosts = [
                'host'=>'127.0.0.1',
                'port'=>'9200',
                'scheme'=>'http'
            ];
            // tạo ra đối tượng elastickseach
            $client = ClientBuilder::create()->setHosts($hosts)->build();
            // check index article có tồn tại hay không
            $exits = $client->indices()->exists(['index'=>'products']);
//            dd($exits);
            if ($exits)
            {
                $param = [
                    'index'=>'products',
                    'type'=>'products_type',
                    'body'=>[
                        "query"=>[
                            'match'=>['pro_name'=>$search]
                        ]
                    ]
                ];
                $result = $client->search($param);
//                dd($result);
                $total = $result["hits"]["total"]["value"];

                if ($total >0)
                {

                    $per_page = 5;
                    $number_page = ceil(count($result["hits"]["hits"])/$per_page);
//                    dd(ceil(2.1));
                    if (!is_numeric($request->page))
                    {
                        $request->page = 1;
                    }
                    $current_page = $request->page ?? 1;
                    $starting_point = ($current_page * $per_page) - $per_page;
                    $array = array_slice($result["hits"]["hits"], $starting_point, $per_page, true);
                    return view('HTML.SearchProduct',["result"=>$array,"number_page"=>$number_page]);
                }
                else
                {
                    return view('HTML.SearchProduct',["result"=>null]);
                }
            }
            else
            {
                $items = null;
                return view('HTML.SearchProduct',["result"=>$items]);
            }
        }
        else
        {
            return view('erorrs.404');
        }


    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function cart()
    {
        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            $cart = $this->cart_controller;
            $list_id_product = $cart->map(function ($parent) use($cart)
            {
                return $parent->pro_id;
            })->toArray();
            $list_product = $cart->map(function ($parent) use($cart,$list_id_product)
            {
                $product = Product::select('pro_id','pro_name','pro_price','pro_picture')->whereIn('pro_id',$list_id_product)->get();
                foreach ($product as $pro) {
                    if ($pro->pro_id == $parent->pro_id) {
                        $parent->products_cart = $pro;
                    }
                }
                return $parent;
            });
            $price_total = 0;
            foreach ($list_product as $value)
            {
                $price_total += $value["quantity"]*$value["products_cart"]["pro_price"];
            }

            return view('HTML.cart',["cart"=>$cart,"list_product"=>$list_product,"total_price"=>$price_total]);
        }
        else
        {
            Session::put('error','Bạn chưa đăng nhập! Vui lòng bạn đăng nhập');
            return redirect('/');
        }

    }
    public function deletecart(Request $request)
    {
        $data = $request->all();
        $pro_id = $data["masanpham"];
        $user = Session::all();
        $user_id = $user["user"]["id"];
        if(Cart::where('pro_id',$pro_id)->where('user_id',$user_id)->delete())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $pro_id = $data["masanpham"];
        $soluong = $data["soluong"];
        $user = Session::all();
        $user_id = $user["user"]["id"];
        if (Cart::where('pro_id',$pro_id)->where('user_id',$user_id)->update(['quantity' => $soluong]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public function errors_404()
    {
         $Categories = $this->category_controller;
        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            $cart = $this->getCart();
            return view('erorrs.404',['categoryParent'=>$Categories,'cart'=>$cart]);
        }
        else
        {
            return view('erorrs.404',['categoryParent'=>$Categories]);
        }
    }
}
