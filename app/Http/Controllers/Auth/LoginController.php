<?php

namespace dungthinh\Http\Controllers\Auth;

use dungthinh\Http\Controllers\Controller;
use Cookie;
use Hash;
use Request;
use Session;
use Validator;
use dungthinh\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use dungthinh\Library\CommonFunction;
use dungthinh\Http\Controllers\ProductsController;
use dungthinh\Http\Controllers\OptionController;

use Socialite;
use dungthinh\Models\Role;
use dungthinh\Models\RoleUser;
use Auth;
use dungthinh\Models\Logging;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen.
    |
    */
    public $classCommonFunction;
    public $settingsData = array();
    public $recaptchaData = array();
    public $product;
    public $option;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('verifyLoginPage');
      $this->classCommonFunction  = new CommonFunction();
      $this->product  = new ProductsController();
      $this->option  = new OptionController();
      $this->recaptchaData  = get_recaptcha_data();
      $this->settingsData['_settings_data']  =  $this->option->getSettingsData();
    }
    
  /**
   * 
   * Manage admin user cookie data
   *
   * @param null
   * @return response
   */
  public function goToAdminLoginPage(){
    $user_view = '';
    $pass_view = '';
    
    $this->classCommonFunction->set_admin_lang();
    
    if(Cookie::has('remember_me_data')){
      $get_cookie   = Cookie::get('remember_me_data');
      $cookie_parse = explode('#', $get_cookie);
      
      if(is_array($cookie_parse) && count($cookie_parse) > 0){
        $userDetails  =  User::find( $cookie_parse[0] );
        $password     =  bcrypt( base64_decode($cookie_parse[1]) );

        if(Hash::check( base64_decode($cookie_parse[1]), $password ) && Hash::check( base64_decode($cookie_parse[1]), $userDetails['password'] )){
          $user_view = $userDetails['email'];
          $pass_view = base64_decode($cookie_parse[1]);
        }
      }
    }
    
    $data = array(
                  'user'  =>  $user_view,
                  'pass'  =>  $pass_view,
                  'is_enable_recaptcha' => $this->recaptchaData['enable_recaptcha_for_admin_login']
    );
    
    return view('pages.auth.admin-login')->with('data', $data);

    // return response()->json($data);
  }
  
  /**
   * 
   * Manage frontend user cookie data
   *
   * @param null
   * @return response
   */
  public function goToFrontendLoginPage(){
    
    $user_view  =  '';
    $pass_view  =  '';
    $data       =  array(); 
    
    if(Cookie::has('frontend_remember_me_data')){
      $get_cookie   = Cookie::get('frontend_remember_me_data');
      $cookie_parse = explode('#', $get_cookie);
      
      if(is_array($cookie_parse) && count($cookie_parse) > 0){
        $userDetails  =  User::find( $cookie_parse[0] );
        $password     =  bcrypt( base64_decode($cookie_parse[1]) );

        if(Hash::check( base64_decode($cookie_parse[1]), $password ) && Hash::check( base64_decode($cookie_parse[1]), $userDetails['password'])){
          $user_view = $userDetails['name'];
          $pass_view = base64_decode($cookie_parse[1]);
        }
      }
    }

    $login_data = array(
                  'user'  =>  $user_view,
                  'pass'  =>  $pass_view,
                  'is_enable_recaptcha' => $this->recaptchaData['enable_recaptcha_for_user_login']
    );
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['frontend_login_data'] =  $login_data;
    $data['settings_data'] =  global_settings_data();
    
    return view('pages.auth.user-login')->with( $data );

    // return response()->json($data);

  }
  
  /**
   * 
   * Manage admin login
   *
   * @param null
   * @return response
   */
  public function postAdminLogin(){
    if( Request::isMethod('post') && Session::token() == Input::get('_token') ){
      $get_input = Input::all();
      
      $rules = [
                  'admin_login_email'             => 'required|email',
                  'admin_login_password'          => 'required'
      ];
      
      $messages = [
                    'admin_login_email.required' => Lang::get('validation.email_required'),
                    'admin_login_email.email' => Lang::get('validation.email_is_email'),
                    'admin_login_password.required' => Lang::get('validation.password_required')
      ];
      
      // if($this->recaptchaData['enable_recaptcha_for_admin_login'] == true){
      //   $rules['g-recaptcha-response']  = 'required|captcha';
      //   $messages['g-recaptcha-response.required']  =  Lang::get('validation.g_recaptcha_response_required');
      // }
      
      $validator = Validator:: make($get_input, $rules, $messages);
      
      if($validator->fails()){
        return redirect()-> back()
        ->withInput(Input::except('admin_login_password'))
        ->withErrors( $validator );
      }
      else{
        $email      =      Input::get('admin_login_email');
        $password   =      bcrypt(Input::get('admin_login_password'));
        
        $userdata   =      ['email' => $email, 'user_status' => 1];
        
        $data       =      User::where($userdata)->first();
        
        if(!empty($data) && isset($data->password) && isset($data->id)){
          $get_user_role =  get_user_details( $data->id );
          
          if(Hash::check(Input::get('admin_login_password'), $password) && Hash::check(Input::get('admin_login_password'), $data->password)){
            
            if(Session::has('shopist_admin_user_id')){
              Session::forget('shopist_admin_user_id');
              Session::put('shopist_admin_user_id', $data->id);
            }
            elseif(!Session::has('shopist_admin_user_id')){
              Session::put('shopist_admin_user_id', $data->id);
            }

            Logging::log("Đăng nhập thành công");

            $remember = (Input::has('remember_me')) ? true : false;

            if($remember == TRUE){
              $remember_data = '';
              $remember_data = $data->id . '#' . base64_encode(Input::get('admin_login_password'));
              
              return redirect()->route('admin.dashboard')->withCookie(cookie()->forever('remember_me_data', $remember_data));
            }
            elseif($remember == FALSE){
              if(Cookie::has('remember_me_data')){
                $cookie = Cookie::forget('remember_me_data');
                return redirect()->route('admin.dashboard')->withCookie( $cookie );
              }
              else {
                return redirect()->route('admin.dashboard');
              }
            }
          }
          else{            
            
            Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
            return redirect()-> back();
          }
        }
        else{

          Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
          return redirect()-> back();
        }
      }
    }
    else{

      return redirect()-> back();
    }
  }
  
  /**
   * 
   * Manage frontend login
   *
   * @param null
   * @return void
   */
  public function postFrontendLogin(){
    if( Request::isMethod('post') && Session::token() == Input::get('_token') ){
      $inputData = Input::all();
      
      $rules = [
        'login_username'             => 'required',
        'login_password'             => 'required'
      ];
      
      $messages = [
        'login_username.required'   =>  Lang::get('validation.user_name_required'),
        'login_password.required'   =>  Lang::get('validation.password_required')
      ];
      
      // if($this->recaptchaData['enable_recaptcha_for_user_login'] == true){
      //   $rules['g-recaptcha-response']  = 'required|captcha';
      //   $messages['g-recaptcha-response.required']  =  Lang::get('validation.g_recaptcha_response_required');
      // }
      
      $validator = Validator:: make($inputData, $rules, $messages);
      
      if($validator->fails()){
        return redirect()-> back()
        ->withInput()
        ->withErrors( $validator );
      }
      else{
        $username       =      Input::get('login_username');
        $password       =      bcrypt(Input::get('login_password'));
        $userdata       =      ['name' => $username, 'user_status' => 1];
        $data           =      User::where($userdata)->first();
        
        if(!empty($data) && isset($data->password) && isset($data->id)){
          $get_user_role =  get_user_details( $data->id );
           
          if(Hash::check(Input::get('login_password'), $password) && Hash::check(Input::get('login_password'), $data->password)){
            
            if(Session::has('dt_frontend_user_id')){
              Session::forget('dt_frontend_user_id');
              Session::put('dt_frontend_user_id', $data->id);
            }
            elseif(!Session::has('dt_frontend_user_id')){
              Session::put('dt_frontend_user_id', $data->id);
            }

            $remember = (Input::has('login_remember_me')) ? true : false;

            if($remember == TRUE){
              $cookieData  =  array();
              $cookieData  =  $data->id . '#' . base64_encode(Input::get('login_password'));
              
              return redirect()->route('user-account-page')->withCookie(cookie()->forever('frontend_remember_me_data', $cookieData));
            }
            elseif($remember == FALSE){
              if(Cookie::has('frontend_remember_me_data')){
                $cookie = Cookie::forget('frontend_remember_me_data');
                return redirect()->route('user-account-page')->withCookie( $cookie );
              }
              else {
                // return response()->json($data);

                return redirect()->route('user-account-page');
              }
            }
          }
          else{
            Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
            return redirect()-> back();
          }
        }
        else{
          Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
          return redirect()-> back();
        }
      }
    }
    else {
      return redirect()-> back();
    }
  }
  
  /**
   * 
   * logout
   *
   * @param null
   * @return response
   */
  public function logoutFromLogin(){

    Logging::log("Đã đăng xuất");

    if( Request::isMethod('post') && Session::token() == Input::get('_token') ){
      if(Session::has('shopist_admin_user_id')){
        Session::forget('shopist_admin_user_id');
       return redirect()-> route('admin.login');
      }
    }
  }

  /**
   * 
   * Facebook login
   *
   * @param null
   * @return response
   */

  public function redirectToProvider($provider){

    return Socialite::driver($provider)->redirect();

  }

    /**
   * Obtain the user information from facebook.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleProviderCallback($provider){

    $user = Socialite::driver($provider)->user();

    $authUser = $this->findOrCreateUser($user, $provider);

    // Auth::login($authUser, true);

    return redirect()->route('home-page');

  }

  private function findOrCreateUser($user, $provider){

    $User =       new User;
    $Role =       new Role;
    $Roleuser =   new RoleUser;
    $email_options = get_emails_option_data();
    
    $get_role = Role::where(['slug' => $this->settingsData['_settings_data']['general_settings']['general_options']['default_role_slug_for_site']])->first();

    $authUser = User::where('email', $user->email)->first();

    if($authUser){

        if(Session::has('dt_frontend_user_id')){
          Session::forget('dt_frontend_user_id');
          Session::put('dt_frontend_user_id', $authUser->id);
        }
        elseif(!Session::has('dt_frontend_user_id')){
          Session::put('dt_frontend_user_id', $authUser->id);
        }
        return redirect()->route('home-page');
    }
    else{
      $User->display_name       =    $user->name;
      $User->name               =    $user->email;
      $User->email              =    $user->email;
      $User->user_photo_url     =    $user->avatar;
      $User->user_status        =    1;
      $User->provider_id        =    $user->id;
      $User->provider           =    $provider;

      if($User->save()){
        $Roleuser->user_id    =    $User->id;
        $Roleuser->role_id    =    $get_role->id;

        if($Roleuser->save()){
          return redirect()->route('home-page');
        }
      }
    }

  }
}