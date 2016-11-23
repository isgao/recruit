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
                $userObj->email = $userObj->username = Input::get('email');
                $userObj->password = Hash::make(Input::get('password'));
                $userObj->create_time = date("Y-m-d H:i:s",time());
                $res = $userObj->save();
                //邮件激活
                event(new \App\Events\register($userObj));
                break;

            //企业注册
            case '1':
                $companyObj = new Company;
                $companyObj->email = Input::get('email');
                $companyObj->password = Hash::make(Input::get('password'));
                $companyObj->create_time = date("Y-m-d H:i:s",time());
                $res = $companyObj->save();
                break;
        }
        //返回请求数据
        return $res;

    }

    
    public function sel($data){
        $arr = User::where('email',$data['email'])->first();
//        return $data['password'];
        if($arr!=null){
            $bool = Hash::check($data['password'],$arr->password);
//            Hash::check('plain-text', $hashedPassword);
           // return $bool;
            if($bool){
                //dd($arr->username);
                return $arr;
            }else{
                return false;
            }
        }else{
            return false;
        }
//        return $arr;
     }

}