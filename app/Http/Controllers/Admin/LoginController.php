<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\User;

require_once '../resources/org/code/Code.class.php';


class LoginController extends CommonController
{
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误！');
            }
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }
            session(['user'=>$user]);
//            dd(session('user'));
            return redirect('admin/index');

        }else {
            return view('admin.login');
        }
    }
   //退出登录
    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    //验证码获取
    public function code()
    {
        $code = new \Code;
        $code->make();
    }

/*    public function crypt()
    {
        $str = '123456';
//        $str_p="eyJpdiI6Imh1aUN2NnlSbWRqdUpiQWNTYVArWGc9PSIsInZhbHVlIjoibTY3S21oT096YThySXIyVW94T1lHUT09IiwibWFjIjoiY2RhMTU1OTU0NjlmZjdhMjI1ZjFiNDliNDcwZjg4ODdkZjA1ZjJhZjI3ZWFlMDg5NGFmYmU0NGFiZDU0ZTJjOCJ9";

        echo Crypt::encrypt($str);
        echo "<br/>";
//        echo Crypt::decrypt($str_p);
    }*/

/*    public function getcode()
    {
        $code = new \Code;
        echo $code->get();
    }*/

}
