<?php
namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
    }
    public function getProductNew(Request $request)
    {
        $filds = $request->filds;
        $array_filds= [];
        if(!empty($filds))
        {
            $array_filds = explode(",",$filds);
        }
        $limit = $request->limit;
        if(isset($limit))
        {
            if (is_numeric($limit))
            {
                if($limit > 0 && $limit <10)
                {
                    if(count($array_filds) > 0)
                    {
                        $products_new = Product::where('pro_active',1)->where('pro_new',1)->orderBy('pro_id','desc')->limit($limit)->select($array_filds)->get();
                    }
                    else
                    {
                        $products_new = Product::where('pro_active',1)->where('pro_new',1)->orderBy('pro_id','desc')->limit($limit)->get();
                    }
                }
                else
                {
                    return [
                        'status_code'=> 404,
                        'errors' =>"Du lieu nhap vao phai lon hon 0 va nho hon 10"
                    ];
                }
            }
            else
            {
                return [
                    'status_code'=> 404,
                    'errors' =>"Du lieu nhap vao khong dung"
                ];
            }
        }
        else
        {
            $limit = 6;
            if(count($array_filds) > 0)
            {
                $products_new = Product::where('pro_active',1)->where('pro_new',1)->orderBy('pro_id','desc')->limit($limit)->select($array_filds)->get();
            }
            else
            {
                $products_new = Product::where('pro_active',1)->where('pro_new',1)->orderBy('pro_id','desc')->limit($limit)->get();
            }
        }
        $products_new = $products_new->toArray();
        $i = 0;
        foreach ($products_new as $value)
        {
            $products_new[$i]["pro_picture"]="http://localhost:8081".getUrlImageMain($value["pro_picture"],200);
            $i++;
        }
        return [
          'status_code'=> 200,
          'data' =>$products_new
        ];
    }
    public function getProductwithCategory(Request $request)
    {
        $category = $this->category_controller;
        $limit = $request->limit;
        if(isset($limit))
        {
            if (is_numeric($limit))
            {
                if($limit > 0 && $limit <10)
                {
                    $category_parent = $category->map(function($parent) use($category,$limit){
                        $parent->list_product = Product::where('pro_active',1)->where('pro_cat_root_id',$parent->cat_id)->limit($limit)->get();
                        return $parent;
                    });
                }
                else
                {
                    return [
                        'status_code'=> 404,
                        'errors' =>"Du lieu nhap vao phai lon hon 0 va nho hon 10"
                    ];
                }
            }
            else
            {
                return [
                    'status_code'=> 404,
                    'errors' =>"Du lieu nhap vao khong dung"
                ];
            }
        }
        else
        {
            $limit = 6;
            $category_parent = $category->map(function($parent) use($category,$limit){
                $parent->list_product = Product::where('pro_active',1)->where('pro_cat_root_id',$parent->cat_id)->limit($limit)->get();
                return $parent;
            });
        }
        $category_parent = $category_parent->map(function($parent) use($category_parent){
            $i = 0;
            foreach ($parent->list_product as $value)
            {
                $parent->list_product[$i]["pro_picture"]="http://localhost:8081".getUrlImageMain($value["pro_picture"],200);
                $i++;
            }
            return $parent;

        });
        return $category_parent;
    }

}
