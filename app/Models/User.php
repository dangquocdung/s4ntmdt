<?php
namespace shopist\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   
  protected $table = 'users';
  protected $fillable = ['display_name','name', 'email', 'password', 'provider', 'provider_id','user_status'];
  //protected $primaryKey = 'id';
  
  public function roles()
  {
    return $this->belongsToMany('shopist\Models\Role');
  }
  
}
