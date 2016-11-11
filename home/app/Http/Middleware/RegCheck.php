<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Company;

class RegCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //验证唯邮箱唯一
        $companyObj = new Company;
        $companyCheck = $companyObj->where('email',$formData['email'])->first();

        $userObj = new User;
        $userCheck = $userObj->where('email',$formData['email'])->first();

        if ($companyCheck !== NULL || $userCheck !== NULL) 
        {
            var_dump($companyCheck);
            var_dump($userCheck);die;
        }
        
        return $next($request);
    }
}
