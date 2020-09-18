<?php

namespace App;
namespace App\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories_multi';
    protected $fillable = [
        'cat_id', 'cat_name','cat_rewrite','cat_parent_id','cat_has_child','cat_active'
    ];
    protected $primaryKey = 'cat_id';

    public function get()
    {
        $listCategory = DB::table('categories_multi')->select('cat_rewrite','cat_name','cat_parent_id','cat_id')->get();
        return $listCategory;
    }
//    public function getCategory($idCategory)
//    {
//        $listCategory = DB::table('categories_multi')->where('cat_parent_id',$idCategory)->get();
//        return $listCategory;
//    }
//    public function getCategoryParent($slug)
//    {
//        $listCategoryParent = DB::table('categories_multi')->where('cat_rewrite',$slug)->first();
//        return $listCategoryParent;
//    }
}


