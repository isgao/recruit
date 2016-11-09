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
    public function index()
    {
    	return view('site.index');
    }
}
