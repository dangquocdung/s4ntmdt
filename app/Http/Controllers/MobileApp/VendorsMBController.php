<?php
namespace shopist\Http\Controllers\MobileApp;

use shopist\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use shopist\Models\UsersDetail;
use shopist\Models\User;
use shopist\Models\Post;
use shopist\Models\PostExtra;
use shopist\Models\VendorAnnouncement;
use shopist\Models\Comment;
use shopist\Models\VendorPackage;
use shopist\Models\VendorWithdraw;
use shopist\Models\VendorTotal;
use shopist\Models\Option;
use Illuminate\Support\Facades\Lang;
use Validator;
use Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use shopist\Library\GetFunctionMB;
use Illuminate\Support\Facades\App;
use shopist\Library\CommonFunction;

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