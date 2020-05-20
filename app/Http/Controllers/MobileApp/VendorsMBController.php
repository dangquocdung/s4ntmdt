<?php
namespace dungthinh\Http\Controllers\MobileApp;

use dungthinh\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use dungthinh\Models\UsersDetail;
use dungthinh\Models\User;
use dungthinh\Models\Post;
use dungthinh\Models\PostExtra;
use dungthinh\Models\VendorAnnouncement;
use dungthinh\Models\Comment;
use dungthinh\Models\VendorPackage;
use dungthinh\Models\VendorWithdraw;
use dungthinh\Models\VendorTotal;
use dungthinh\Models\Option;
use Illuminate\Support\Facades\Lang;
use Validator;
use Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use dungthinh\Library\GetFunctionMB;
use Illuminate\Support\Facades\App;
use dungthinh\Library\CommonFunction;

class VendorsMBController extends Controller
{
  public $carbonObject;
  public $option;
  public $env;
  public $classCommonFunction;

  public function __construct(){
		$this->carbonObject = new Carbon();
    $this->classCommonFunction = new CommonFunction();
    $this->env = App::environment();
  }
  
    /**
   * 
   * Get all vendors
   *
   * @param null
   * @return array
   */
  public function getAllVendors( $pagination = false, $search_val = null, $status_flag = -1 ){

    $users_details = array();

    $get_role_details = get_roles_details_by_role_slug('vendor');
    
    if(!empty($get_role_details)){

      // $get_users = get_users_by_role_id( $get_role_details->id, $search_val, $status_flag);
      
      $get_users = get_users_by_display_name_mb( $get_role_details->id, $search_val, $status_flag);
      
      $users_details = $get_users;
    }
      
    return $users_details;
  }

}