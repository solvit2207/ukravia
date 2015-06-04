<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classy".
 *
 * @property string $class
 * @property double $margin
 *
 * @property Place[] $places
 */
class Classy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class', 'margin'], 'required'],
            [['margin'], 'number'],
            [['class'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class' => 'Class',
            'margin' => 'Margin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
        return $this->hasMany(Place::className(), ['class' => 'class']);
    }
}
