<?php

namespace app\models;

use yii\db\ActiveRecord;

class Message extends ActiveRecord
{
	/**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'message';
    }
}
?>