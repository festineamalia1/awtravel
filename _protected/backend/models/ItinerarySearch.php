<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Itinerary;

/**
 * ItinerarySearch represents the model behind the search form of `app\models\Itinerary`.
 */
class ItinerarySearch extends Itinerary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_iti', 'biaya', 'id_ngr'], 'integer'],
            [['hari', 'kunjungan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Itinerary::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_iti' => $this->id_iti,
            'biaya' => $this->biaya,
            'id_ngr' => $this->id_ngr,
        ]);

        $query->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'kunjungan', $this->kunjungan]);

        return $dataProvider;
    }
}
