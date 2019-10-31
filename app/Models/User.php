<?php
namespace shopist\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{

  use AuthenticableTrait;
   
  protected $table = 'users';
  protected $fillable = ['display_name','name', 'email', 'password', 'provider', 'provider_id','user_status'];
  //protected $primaryKey = 'id';
  
  public function roles()
  {
    return $this->belongsToMany('shopist\Models\Role');
  }
  
}
