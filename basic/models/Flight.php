<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property integer $id
 * @property integer $reys
 * @property string $city
 * @property string $departure
 * @property string $arrival
 *
 * @property City[] $cities
 * @property Date[] $dates
 * @property Reserv[] $reservs
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reys', 'city', 'departure', 'arrival'], 'required'],
            [['reys'], 'integer'],
            [['departure', 'arrival'], 'safe'],
            [['city'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reys' => 'Reys',
            'city' => 'City',
            'departure' => 'Departure',
            'arrival' => 'Arrival',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['city' => 'city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDates()
    {
        return $this->hasMany(Date::className(), ['reys' => 'reys']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservs()
    {
        return $this->hasMany(Reserv::className(), ['reys' => 'reys']);
    }
}
