<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserv".
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $phone
 * @property string $tickettype
 * @property integer $id_place
 * @property double $price
 * @property string $time
 * @property integer $reys
 * @property string $date
 * @property double $baggage
 *
 * @property Place $idPlace
 * @property Flight $reys0
 * @property Date $date0
 */

class Reserv extends \yii\db\ActiveRecord
{ public $place;
    public $price1;
    public $pricemargin;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [// цена и время не обяз поля!!!
            [['surname', 'name', 'patronymic', 'phone', 'tickettype', 'class', 'id_place', 'reys', 'date', 'baggage'], 'required'],
            [['id_place', 'reys'], 'integer'],
            [['price', 'baggage'], 'number'],
            [['time', 'date'], 'safe'],
            [['surname', 'name', 'patronymic', 'class'], 'string', 'max' => 30],
            [['phone'], 'string', 'min'=>13, 'max' => 13],
            [['phone'], 'match', 'pattern'=>'/^([+][0-9]{12})$/i'],
            [['tickettype'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'phone' => 'Номер телефона',
            'tickettype' => 'Тип билета (детский/взрослый)',
            'class' => 'Класс',
            'id_place' => 'Номер места',
            'price' => 'Цена, грн',
            'time' => 'Время бронирования',
            'reys' => 'Номер рейса',
            'date' => 'Дата вылета',
            'baggage' => 'Вес багажа, кг',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlace()
    {
        return $this->hasOne(Place::className(), ['id_place' => 'id_place']);
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
    public function getDate0()
    {
        return $this->hasOne(Date::className(), ['date' => 'date']);
    }
    public static function getDateTimeForDb($timestamp=null)
    {
        if ($timestamp===null){
            return date('Y-m-d H:i:s');
        }
        return date('Y-m-d H:i:s',$timestamp);
    }
    
}
