<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "passager".
 *
 * @property integer $id_pass
 * @property string $firstname
 * @property string $lastname
 * @property string $otch
 * @property string $phone
 * @property string $type
 * @property string $birthday
 *
 * @property Reserv[] $reservs
 */
class Passager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'otch', 'phone', 'type', 'birthday'], 'required'],
            [['birthday'], 'safe'],
            [['firstname', 'lastname', 'otch'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 13],
            [['type'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pass' => 'Id Pass',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'otch' => 'Otch',
            'phone' => 'Phone',
            'type' => 'Type',
            'birthday' => 'Birthday',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservs()
    {
        return $this->hasMany(Reserv::className(), ['id_pass' => 'id_pass']);
    }
}
