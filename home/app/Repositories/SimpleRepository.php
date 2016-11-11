<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;

/**
 * @var simple仓库
 * @author 张石磊创建
 */
class SimpleRepository
{
    /**
     * 注册动作
     *
     * @param  User  $user
     * @return int 保存后的自增值
     */
    public function reg($formData)
    {
        //企业注册
        if ($formData['type']) 
        {
            $companyObj = new Company;
            $companyObj->email = $formData['email'];
            $companyObj->password = Hash::make($formData['password']);
            $companyObj->save();
            $insertId = $companyObj->id;
        }
        else
        {
            $userObj = new User;
            //求职者注册
            $userObj->email = $formData['email'];
            $userObj->password = Hash::make($formData['password']);
            $userObj->save();
            $insertId = $userObj->id;
        }

        return $insertId;
    }
}