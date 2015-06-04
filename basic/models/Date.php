<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "date".
 *
 * @property integer $id
 * @property string $date
 * @property integer $reys
 *
 * @property Flight $reys0
 * @property Reserv[] $reservs
 */
class Date extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'reys'], 'required'],
            [['date'], 'safe'],
            [['reys'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'reys' => 'Reys',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReys0()
    {
        return $this->hasOne(Flight::className(), ['reys' => 'reys']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservs()
    {
        return $this->hasMany(Reserv::className(), ['date' => 'date']);
    }
}
