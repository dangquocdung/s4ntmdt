<?php

namespace dungthinh\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use dungthinh\Library\CommonFunction;


class Logging
{
    public static function log($param1)
    {
        Logging::log2($param1, "");
    }

    public static function log2($param1, $param2)
    {
        Logging::log3($param1, $param2, "");
    }
        
    public static function log3($param1, $param2, $param3)
    {
        $common_obj  = new CommonFunction();
        $data = $common_obj->commonDataForAllPages();

        // $id = Auth::user()->id;
        // $name = DB::table('users')->where('id', '=', $id)->get()->first()->name;

        $values = array('user' => $data['user_data']['user_name'],
            'email' => $data['user_data']['user_email'],
            'param1' => $param1, 'param2' => $param2, 'param3' => $param3, 'param4' => '', 'param5' => $_SERVER['REMOTE_ADDR'],
            'updated_at' => new \DateTime());
        $values['created_at'] = new \DateTime();
        DB::table('logging')->insert($values);
    }

}
