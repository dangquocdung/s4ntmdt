<?php
namespace dungthinh\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
   
  protected $table = 'logs';
  protected $fillable = ['name', 'ip', 'action'];
  //protected $primaryKey = 'id';
  
}
