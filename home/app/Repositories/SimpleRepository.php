<?php

namespace App\Repositories;

use Hash;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Input;

/**
 * @var simple仓库
 * @author 张石磊
 */
class SimpleRepository
{
    /**
     * 注册动作
     * @param  User  $user
     * @return string[json] 动作结果信息
     */
    public function reg()
    {
        $type = Input::get('type');
        switch ($type) 
        {
            //求职者注册    
            case '0':
                $userObj = new User;
                $userObj->email = Input::get('email');
                $userObj->password = Hash::make(Input::get('password'));
                $userObj->create_time = date("Y-m-d H:i:s",time());
                $res = $userObj->save();
                break;

            //企业注册
            case '1':
                $companyObj = new Company;
                $companyObj->email = Input::get('email');
                $companyObj->password = Hash::make(Input::get('password'));
                $userObj->create_time = date("Y-m-d H:i:s",time());
                $res = $companyObj->save();
                break;
        }

        //返回请求数据
        if ($res) 
        {
            return '{"success":"true","content":"' . url('/') . '"}';
        }
        else
        {
            return '{"success":"false","msg":"注册失败"}';
        }
    }
}
