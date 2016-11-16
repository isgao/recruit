<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * 验证账号密码
     */
    public function sel_user($username,$password)
    {
        return $this->where('username="'.$username.'"and password="'.$password.'"')->find();
    }
}
?>