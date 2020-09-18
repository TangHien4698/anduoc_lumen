<?php
namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use function GuzzleHttp\json_encode;
class DetailController extends Controller
{
    public function index($link)
    {
        $link = '/'.$link;
        $data = [];
        $Categories = $this->category_controller;
          //first data
        $Product = Product::where('pro_link',$link)->first()->toArray();
        $Product["pro_picture"] = json_decode($Product["pro_picture"]);
        $Product["pro_picture"] =  array_map(function ($item){
            $item =  "http://localhost:8081".getUrlPicture($item->name);
            return $item;
            },$Product["pro_picture"]);
        $data["product"] = $Product;
        $data["product"]["pro_price"] = number_format($data["product"]["pro_price"]);
        $Categories = $Categories->toArray();
        foreach ($Categories as $value) {
            if ($value["cat_id"] == $Product["pro_cat_root_id"]) {
                foreach ($value["childs"] as $child) {
                    if ($child["cat_id"] == $Product["pro_cat_id"]) {
                        $data["breadcamp"]["parent"]= $value;
//                        $data["category_parent"] = $value;
                        $data["breadcamp"]["child"] = $child;
                        return [
                            'status_code'=> 200,
                            'data' =>$data
                        ];
                    }
                }
            }
        }
        return [
            'status_code'=> 404,
            'errors' =>"Du lieu nhap vao khong dung"
        ];

    }
}
