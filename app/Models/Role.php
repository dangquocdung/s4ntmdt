<?php
namespace dungthinh\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';
  
  public function users()
  {
    return $this->belongsToMany('dungthinh\Models\User');
  }
}
