<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DtTransaksi;

/**
 * DtTransaksiSearch represents the model behind the search form of `app\models\DtTransaksi`.
 */
class DtTransaksiSearch extends DtTransaksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_det_tr', 'jml_org', 'id_ngr', 'id_bank_tjn', 'id_user'], 'integer'],
            [['tgl', 'wkt_cicil', 'status'], 'safe'],
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
        $query = DtTransaksi::find();

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
            'id_det_tr' => $this->id_det_tr,
            'tgl' => $this->tgl,
            'jml_org' => $this->jml_org,
            'id_ngr' => $this->id_ngr,
            'id_bank_tjn' => $this->id_bank_tjn,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'wkt_cicil', $this->wkt_cicil])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
