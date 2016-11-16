<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 学历模板
 */
class Education extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return "{{%education}}";
    }
}