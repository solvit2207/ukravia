<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickettype".
 *
 * @property integer $id
 * @property string $type
 */
class Tickettype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tickettype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }
}
