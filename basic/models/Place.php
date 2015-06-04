<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $id_place
 * @property string $class
 * @property string $status
 *
 * @property Class $class0
 * @property Reserv[] $reservs
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class', 'status'], 'required'],
            [['class', 'status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_place' => 'Id Place',
            'class' => 'Class',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass0()
    {
        return $this->hasOne(Classy::className(), ['class' => 'class']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservs()
    {
        return $this->hasMany(Reserv::className(), ['id_place' => 'id_place']);
    }
}
