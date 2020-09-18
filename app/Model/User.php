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
class User extends Model
{
    use Authenticatable, Authorizable;
    protected $table = 'account_socialite';
    protected $fillable = [
        'name', 'email','provider','provider_id','email_verified_at'
    ];
    public $timestamps =FALSE;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
