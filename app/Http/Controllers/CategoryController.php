<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
class CategoryController extends Controller
{
    public function index($slug)
    {
//        $objController = new Controller();
        $Categories = $this->category_controller;
        if(\Illuminate\Support\Facades\Session::has('user'))
        {
            $cart = $this->cart_controller;
        }
        $CategoryParent = $Categories->where('cat_rewrite',$slug);
        $Category = $CategoryParent->toArray();
       // dd($Category);
        if (count($Category) >0)
        {
            //Parent
            foreach ($Category as $value)
            {
                $listProduct = Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_root_id',$value["cat_id"])->where('pro_active',1)->orderBy('pro_id','desc')->paginate(25);

                if(\Illuminate\Support\Facades\Session::has('user'))
                {
                    return view('HTML.Category',['Category'=>$value,'categoryParent'=>$Categories,'listProduct'=>$listProduct,'cart'=>$cart]);
                }
                else
                {
                    return view('HTML.Category',['Category'=>$value,'categoryParent'=>$Categories,'listProduct'=>$listProduct]);
                }
            }

        }
        else
        {
            //child
            $Categories = $Categories->toArray();
            foreach ($Categories as $value)
            {
                foreach ($value["childs"] as $child)
                {
                    $listProduct = Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_id',$child->cat_id)->where('pro_active',1)->orderBy('pro_id','desc')->paginate(25);
                    $CategoryChild = $child;

                    if(\Illuminate\Support\Facades\Session::has('user'))
                    {
                        return view('HTML.Category',['Category'=>$value,'categoryParent'=>$Categories,'listProduct'=>$listProduct,'categoryChild'=>$CategoryChild,'cart'=>$cart]);
                    }
                    else
                    {
                        return view('HTML.Category',['Category'=>$value,'categoryParent'=>$Categories,'listProduct'=>$listProduct,'categoryChild'=>$CategoryChild]);
                    }
                }
            }
        }
    }
    public function create(){} // show create form
    public function store(Request $request){ } // handle the form POST
    public function show($id){} // show a single domain
    public function edit($id){} // show edit page
    public function update(Request $request, $id){} // handle show edit page POST
    public function destroy($id){} // delete a domain
    public function filterAllProductwithCategory(Request $request)
    {
        $data = $request->all();
        $idCategory = $data["idCategory"];
        $modelProduct = new Product();
        $listProduct = $modelProduct->filterAllProductwithCategory($idCategory)->toArray();
        return view('Ajax.show_productcategory')->with('listProduct', $listProduct);
    }
}
