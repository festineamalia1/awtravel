<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Negara;
use yii\data\Pagination;

/**
 * NegaraSearch represents the model behind the search form of `app\models\Negara`.
 */
class NegaraSearch extends Negara
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ngr', 'slot_awal', 'slot_max', 'biaya', 'include', 'exclude', 'dp', 'id_iti'], 'integer'],
            [['name', 'wtk_berangkat', 'wkt_plg', 'deskripsi', 'musim', 'ft_utama'], 'safe'],
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
        $query = Negara::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $query;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_ngr' => $this->id_ngr,
            'slot_awal' => $this->slot_awal,
            'slot_max' => $this->slot_max,
            'biaya' => $this->biaya,
            'include' => $this->include,
            'exclude' => $this->exclude,
            'dp' => $this->dp,
            'id_iti' => $this->id_iti,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'wtk_berangkat', $this->wtk_berangkat])
            ->andFilterWhere(['like', 'wkt_plg', $this->wkt_plg])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'musim', $this->musim])
            ->andFilterWhere(['like', 'include', $this->include])
            ->andFilterWhere(['like', 'exclude', $this->exclude])
            ->andFilterWhere(['like', 'ft_utama', $this->ft_utama]);

        return $query;
    }
}
