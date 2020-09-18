<?php
namespace App\Http\Controllers\Api\v1;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

class CategoryController extends Controller
{
    public function index()
    {
        return $this->category_controller;
    }
    public function getProduct($slug,Request $request)
    {
        $page = $request->page;
          if (!isset($page))
          {
              $page=1;
          }
        $limit = $request->limit;
          if(!isset($limit))
          {
              $limit=25;
          }
          $from = ($page -1)*$limit;
        $categories = $this->category_controller;
        $categories = $categories["no_group"];
        $category = $categories->where('cat_rewrite',$slug)->first()->toArray();
        $category_me = $category;
        $category["breadcamp"] = [];
        if ($category["cat_parent_id"] > 0)
        {
            $category["products"] =Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_id',$category["cat_id"])->where('pro_active',1)->orderBy('pro_id','desc')->offset($from)->limit($limit)->get();
            $category["page_next"] = Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_id',$category["cat_id"])->where('pro_active',1)->orderBy('pro_id','desc')->offset($limit*$page)->limit($limit)->get();
            $category["parent"] = $categories->where('cat_id',$category["cat_parent_id"])->first()->toArray();
            $category["breadcamp"]["parent"]=$category["parent"];
            $category["breadcamp"]["child"]=$category_me;

        }
        else
        {
//              dd(Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_root_id',$category["cat_id"])->where('pro_active',1)->orderBy('pro_id','desc')->offset($from)->limit($limit)->get());
                $category["products"] =Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_root_id',$category["cat_id"])->where('pro_active',1)->orderBy('pro_id','desc')->offset($from)->limit($limit)->get();
                $category["page_next"] =Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->where('pro_cat_root_id',$category["cat_id"])->where('pro_active',1)->orderBy('pro_id','desc')->offset($limit*$page)->limit($limit)->get();
                $category["breadcamp"]["parent"]=$category_me;
        }
        $category["products"]=$category["products"]->toArray();
        $i = 0;
//        dd($category);
        foreach ($category["products"] as $value)
        {
            $category["products"][$i]["pro_picture"] = "http://localhost:8081".getUrlImageMain($value["pro_picture"],200);
            $category["products"][$i]["pro_price"] = number_format($category["products"][$i]["pro_price"]);
            $i++;
        }
        if(count($category["page_next"]) > 0)
        {
            $category["page_next"] = (int)$page+1;
        }
        else
        {
            $category["page_next"] = null;
        }
        $category["page_current"]= (int)$page;
        return $category;
    }
}
