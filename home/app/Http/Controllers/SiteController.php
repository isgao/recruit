<?php

namespace App\Http\Controllers;

use Alert;
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
    	alert('恭喜您中奖了！')->autoclose(4000);
    	return response()->view('site.index')->cookie('fork', 'stone', 200);
    }
}
