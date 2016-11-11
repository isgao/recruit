<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户模型
 */
class User extends Model
{
	//表名
	protected $table = 'user';
	//关闭时间戳
    public $timestamps = false;
}
