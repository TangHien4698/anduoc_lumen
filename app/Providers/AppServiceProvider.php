<?php

namespace App\Providers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Auth
        Schema::defaultStringLength(191);
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('email')) {
                return User::where('email', $request->input('email'))->first();
            }
        });


        $categories = Category::where('cat_active',1)->get();
        $categories_parent = $categories->where('cat_parent_id',0);
        $products_new = Product::where('pro_active',1)->where('pro_new',1)->orderBy('pro_id','desc')->limit(6)->get();
        $id_pro_new = $products_new->map(function($item){
            return $item->pro_id;
        })->toArray();
        // chạy vòng lặp để thêm phần tử vào
        $products_main = $categories_parent->map(function($parent) use($categories,$id_pro_new){
            $parent->childs = $categories->where('cat_parent_id',$parent->cat_id);
            $childs_id =  $parent->childs->map(function($cat){
                return $cat->cat_id;
            })->toArray();
            if(count($childs_id)==0) return null;
            $parent->products = Product::select('pro_id','pro_name','pro_link','pro_picture','pro_price')->whereNotIn('pro_id',$id_pro_new)->whereIn('pro_cat_id',$childs_id)->where('pro_active',1)->orderBy('pro_id','desc')->limit(6)->get();
            if( $parent->products->count()==0) return null;
            return $parent;
        });
        $products_main = $products_main->filter(function($item){
            return $item != null&&!empty($item->products);
        });
        view()->share('categoryParent', $products_main);
    }


    public function register()
    {
        // ...
        $this->app->singleton('Illuminate\Contracts\Routing\ResponseFactory', function ($app) {
            return new \Illuminate\Routing\ResponseFactory(
                $app['Illuminate\Contracts\View\Factory'],
                $app['Illuminate\Routing\Redirector']
            );
        });

    }

}
