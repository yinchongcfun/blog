<?php
/**
 * Created by PhpStorm.
 * User: Hello Warm
 * Date: 2017/7/24
 * Time: 14:13
 */

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){
    //测试数据库连接
//       $pdo=DB::connection()->getPdo();
//        dd($pdo);
        $name='小红';
        return view('home',compact('name'));
    }
}