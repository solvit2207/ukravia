<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Passager;

/**
 * PassagerSearch represents the model behind the search form about `app\models\Passager`.
 */
class PassagerSearch extends Passager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pass'], 'integer'],
            [['firstname', 'lastname', 'otch', 'phone', 'type', 'birthday'], 'safe'],
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
        $query = Passager::find();

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
            'id_pass' => $this->id_pass,
            'birthday' => $this->birthday,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'otch', $this->otch])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
