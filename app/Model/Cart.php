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
class Cart extends Model
{
    public $timestamps =FALSE;
    protected $table = 'cart';
    protected $fillable = [
        'pro_id', 'cart_id','user_id','quantity'
    ];


}


