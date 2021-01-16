<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Foto;

/**
 * FotoSearch represents the model behind the search form of `app\models\Foto`.
 */
class FotoSearch extends Foto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_foto', 'id_ngr'], 'integer'],
            [['name', 'ft', 'ket'], 'safe'],
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
        $query = Foto::find();

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
            'id_foto' => $this->id_foto,
            'id_ngr' => $this->id_ngr,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ft', $this->ft])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
