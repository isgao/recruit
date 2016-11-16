<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 岗位模板
 */
class Position extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return "{{%position}}";
    }
}