<?php

namespace App\Http\Controllers;

use Alert;
use Socialite;
use Illuminate\Http\Request;
use Germey\Geetest\CaptchaGeetest;
use App\Http\Controllers\Controller;
use App\Repositories\SimpleRepository;

class SimpleController extends Controller
{
    use CaptchaGeetest;

    protected $simple;

	/**
     * simple仓库实例。
     * @var simpleRepository
     * @author [张石磊] <[<email address>]>
     */
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
      if ($res) 
      {
          alert()->success('恭喜您注册成功，请激活您的邮箱')->persistent("以后激活");
          return view('simple.login');
      }
      else
      {
          return redirect('/reg');
      }
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
<<<<<<< HEAD
            //print_r($arr->username);
=======
            //dd($arr);
>>>>>>> a735ea3031b6d12826bf7e818d10a4d5612bfeb1
            return redirect('/');
        }
        else
        {
            echo "<script>alert('请输入正确的账号和密码!');</script>";
        }
    }

    /**
     * [exit  退出账户]
     * @param  Request $request [description]
     * @return [type] [description]
     */
    public function _exit(Request $request)
    {
        $request->session()->forget('username');

        Alert::message('您已安全退出');

        return response()->view('site.index');
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
