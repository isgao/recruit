<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 工作经验模板
 */
class Experience extends ActiveRecord
{
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return "{{%experience}}";
    }
}