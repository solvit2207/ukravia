<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserv;

/**
 * ReservSearch represents the model behind the search form about `app\models\Reserv`.
 */
class ReservSearch extends Reserv
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pass', 'id_place', 'reys'], 'integer'],
            [['price', 'baggage'], 'number'],
            [['time', 'date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Reserv::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_pass' => $this->id_pass,
            'id_place' => $this->id_place,
            'price' => $this->price,
            'time' => $this->time,
            'reys' => $this->reys,
            'date' => $this->date,
            'baggage' => $this->baggage,
        ]);

        return $dataProvider;
    }
}
