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
    	return response()->view('site.index')->cookie('fork', 'stone', 200);
    }
}
