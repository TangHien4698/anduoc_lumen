<?php

namespace App;
namespace App\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
class Product extends Model
{
//    use Authenticatable, Authorizable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
    protected $table = 'products';
    protected $fillable = [
        'pro_id', 'pro_cat_id','pro_cat_root_id','pro_name','pro_rewrite','pro_picture','pro_price','pro_new','pro_link','pro_total_reviews','pro_rating'
    ];
    protected $primaryKey = 'pro_id';
//
//    /**
//     * The attributes excluded from the model's JSON form.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password',
//    ];
    public function get()
    {
        $listProduct = DB::table('products')->get();
        return $listProduct;
    }
    public function  category()
    {
        return $this->hasOne(
            'App\Model\Category',
            'cat_id',
            'pro_cat_root_id'
        );
    }
//    public function getProductNew()
//    {
//        $listProductNew = DB::table('products')->where('pro_new',1)->select('pro_id','pro_name','pro_price','pro_picture','pro_link')->get();
//        return $listProductNew;
//    }
//    public function getTopProductwithCategoryParent($idCategory)
//    {
//        $listProductwithCategory = DB::table('products')->where('pro_cat_root_id',$idCategory)->limit(6)->select('pro_id','pro_name','pro_price','pro_picture','pro_cat_root_id','pro_link')->get();
//        return $listProductwithCategory;
//    }
    public function filterProduct($idCategory)
    {
        $listProduct = DB::table('products')->where([['pro_cat_id','=',$idCategory],['pro_active','=',1]])->limit(6)->get();
        return $listProduct;
    }
    public function getAllProductwithCategoryParent($idCategory1)
    {
        $listProduct = DB::table('products')->where('pro_cat_root_id',$idCategory1)->paginate(25);
        return $listProduct;
    }
    public function filterAllProductwithCategory($idCategory)
    {
        $listProduct = DB::table('products')->where('pro_cat_id',$idCategory)->get();
        return $listProduct;
    }
//    public function existsLinkProductDetail($link)
//    {
//        return DB::table('products')->where('pro_link',$link)->exists();
//    }
//    public function getDetailProduct($id)
//    {
//        return DB::table('products')->where('pro_id',$id)->select('pro_id','pro_cat_id','pro_cat_root_id','pro_link','pro_name','pro_picture','pro_price','pro_total_reviews','pro_description')->first();
//    }
    public function getProductCategory($idCatagory)
    {
//       / dd($idCatagory);
        $listProduct = DB::table('products')->where('pro_cat_id',$idCatagory)->paginate(25);
        return $listProduct;
    }

}

