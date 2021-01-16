<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankTujuan;

/**
 * BankTujuanSearch represents the model behind the search form of `app\models\BankTujuan`.
 */
class BankTujuanSearch extends BankTujuan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bank_tjn'], 'integer'],
            [['nm_bank', 'nomor_rek', 'nama_rek'], 'safe'],
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
        $query = BankTujuan::find();

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
            'id_bank_tjn' => $this->id_bank_tjn,
        ]);

        $query->andFilterWhere(['like', 'nm_bank', $this->nm_bank])
            ->andFilterWhere(['like', 'nomor_rek', $this->nomor_rek])
            ->andFilterWhere(['like', 'nama_rek', $this->nama_rek]);

        return $dataProvider;
    }
}
