<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SimpleRepository;

class SimpleController extends Controller
{

	/**
     * simple仓库实例。
     * @var simpleRepository
     * @author [张石磊] <[<email address>]>
     */
    protected $simple;

    public function __construct(SimpleRepository $simple)
    {
        $this->simple = $simple;
    }

	/**
	 * [reg_act 用户注册]
	 * @author 张石磊
	 */
    public function reg_act()
    {
    	$res = $this->simple->reg();
        return $res;
    }

    /**
     * [login_act 用户登录]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login_act(Request $request){
        $data = $request->input();
        $arr = $this->simple->sel($data);
        if($arr)
        {
            $request->session()->put('username',$arr->username);
            return redirect('/');
        }
        else
        {
            echo "<script>alert('请输入正确的账号和密码!');</script>";
        }
    }

    /**
     * [qq QQ登录页面]
     * @return [type] [description]
     */
    public function qq()
    {
        return Socialite::driver('qq')->redirect();
    }

    /**
     * [qq_act QQ信息回调]
     * @return [type] [description]
     */
    public function qq_callback(Request $request)
    {
        //session(['state'=>$request->input('state')]);
        $user = Socialite::driver('qq')->user();
        echo "
       <center>
           <table>
               <tr>
                   <td>姓名：</td>
                   <td>{$user->user['nickname']}</td>
               </tr>
               <tr>
                   <td>头像：</td>
                   <td><img src='{$user->user['figureurl_qq_2']}'/></td>
               </tr>
               <tr>
                   <td>地址：</td>
                   <td>{$user->user['province']}-{$user->user['city']}</td>
               </tr>
               <tr>
                   <td>出生年份</td>
                   <td>{$user->user['year']}</td>
               </tr>
           </table>
       </center>";
    }
}
