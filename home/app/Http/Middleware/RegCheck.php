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
        $companyCheck = Company::where('email',$request->input('email'))->first();
        $userCheck = User::where('email',$request->input('email'))->first();

        if ($companyCheck !== NULL || $userCheck !== NULL) 
        {
            //return response()->json(['success' => 'false','msg' => '邮箱已经存在，请换个邮箱'], 200, $headers);
            return redirect('reg');
        }

        return $next($request);
    }
}
