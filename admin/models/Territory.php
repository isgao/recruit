<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 行业领域模板
 */
class Territory extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return "{{%territory}}";
    }
}