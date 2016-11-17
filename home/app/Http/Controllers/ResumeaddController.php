<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SimpleRepository;

class ResumeaddController extends Controller
{
    public function index(){
        return view('ucenter.jianli');
    }
}