<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $city
 * @property double $price
 * @property double $baggage
 *
 * @property Flight $city0
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'price', 'baggage'], 'required'],
            [['price', 'baggage'], 'number'],
            [['city'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'price' => 'Price',
            'baggage' => 'Baggage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity0()
    {
        return $this->hasOne(Flight::className(), ['city' => 'city']);
    }
}
