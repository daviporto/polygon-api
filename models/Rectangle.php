<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Rectangle extends ActiveRecord
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['width', 'height'], 'required'],
            [['width', 'height'], 'number']
        ];
    }

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%rectangle}}';
    }


    /**
     * Calculate sum of areas of all rectangles saved in the database.
     * @return float
     */
    public static function getAreaSum()
    {
        return (new Query())->from('rectangle')->sum('width * height');
    }


}