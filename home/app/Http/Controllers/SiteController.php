<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 站点
 */
class SiteController extends Controller
{

	/**
	 * [index 前台主页]
	 */
    public function index(Request $request)
    {
<<<<<<< HEAD
    	//alert('恭喜您中奖了！')->autoclose(2000);
=======
    	//alert('欢迎光临！')->autoclose(4000);
>>>>>>> a735ea3031b6d12826bf7e818d10a4d5612bfeb1
    	return response()->view('site.index')->cookie('fork', 'stone', 200);
    }
}
