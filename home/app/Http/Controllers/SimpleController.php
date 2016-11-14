<?php

namespace App\Http\Controllers;

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
}
