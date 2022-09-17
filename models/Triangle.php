<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Query;

class Triangle extends ActiveRecord
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
     return  [
         [['side_a', 'side_b', 'side_c'], 'required'],
         [['side_a', 'side_b', 'side_c'], 'number']
       ];
    }

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%triangle}}';
    }


    /**
     * Calculate sum of areas of all triangles saved in the database.
     * uses Heron's formula
     * @return float
     */
    public static function getAreaSum()
    {
        $query = (new Query())->from('triangle');
        $sum = 0;
        foreach ($query->each() as $triangle) {
            $s = ($triangle['side_a'] + $triangle['side_b'] + $triangle['side_c']) / 2.0;
            $sum += sqrt($s * ($s - $triangle['side_a']) * ($s - $triangle['side_b']) * ($s - $triangle['side_c']));
        }
        return $sum;
    }



}