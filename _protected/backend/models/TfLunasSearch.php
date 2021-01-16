<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TfLunas;

/**
 * TfLunasSearch represents the model behind the search form of `app\models\TfLunas`.
 */
class TfLunasSearch extends TfLunas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tf_lunas', 'id_bank_tjn', 'id_user', 'cashback'], 'integer'],
            [['ft_lunas', 'name', 'nm_rek', 'status', 'tgl'], 'safe'],
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
        $query = TfLunas::find();

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
            'id_tf_lunas' => $this->id_tf_lunas,
            'id_bank_tjn' => $this->id_bank_tjn,
            'id_user' => $this->id_user,
            'cashback' => $this->cashback,
            'tgl' => $this->tgl,
        ]);

        $query->andFilterWhere(['like', 'ft_lunas', $this->ft_lunas])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nm_rek', $this->nm_rek])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
