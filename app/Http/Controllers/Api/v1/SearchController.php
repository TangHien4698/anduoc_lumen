<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ElasticSearchQuery;
use App\Model\Category;
use App\Model\Product;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $elastic = new ElasticSearchQuery('products','products_type');
        $search = $request->keyword;
        $limit = $request->limit;
        $page = $request->page;

          if (isset($search))
          {
              if (!isset($page))
              {
                  $page=1;
              }
              if (!isset($limit))
              {
                  $elastic = $elastic->select('pro_name,pro_id,pro_cat_id,pro_link,pro_price,pro_picture')->moreLikeThis('pro_name',$search)->pagenation($page,true);
              }
              else
              {
                  $elastic = $elastic->select('pro_name,pro_id,pro_cat_id,pro_link,pro_price,pro_picture')->moreLikeThis('pro_name',$search)->limit($limit)->pagenation($page,true);
              }
              if (empty($elastic))
              {
                  return ['status'=>'200','empty'=>1,'detail'=>'Không tìm thấy sản phẩm nào!','next_page'=>null];
              }
              else
              {
                  if(isset($elastic["next_page"]) && $elastic["next_page"] == true)
                  {
                      $next_page = $elastic["next_page"];
                      unset($elastic["next_page"]);

                  }
                  else
                  {
                      $next_page = false;
                  }
                  $elastic = array_map(function($child){
                     $child["pro_picture"]="http://localhost:8081".getUrlImageMain($child["pro_picture"],200);
                     return $child;
                  },$elastic);
                  return ['status'=>'200','detail'=>$elastic,'empty'=>0,'per_page'=>(int)$page,'next_page'=>$next_page];
              }
          }
          else
          {
              return ['status'=>'404','detail'=>'Not found','next_page'=>null];
          }
    }
}

