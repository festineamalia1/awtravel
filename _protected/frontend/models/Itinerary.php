<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itinerary".
 *
 * @property int $id_iti
 * @property string $hari
 * @property string $kunjungan
 * @property int $biaya
 * @property int $id_ngr
 *
 * @property Negara $ngr
 */
class Itinerary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itinerary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hari', 'kunjungan', 'biaya', 'id_ngr'], 'required'],
            [['hari', 'kunjungan'], 'string'],
            [['biaya', 'id_ngr'], 'integer'],
            [['id_ngr'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_ngr' => 'id_ngr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_iti' => 'Id Iti',
            'hari' => 'Hari',
            'kunjungan' => 'Kunjungan',
            'biaya' => 'Biaya',
            'id_ngr' => 'Id Ngr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNgr()
    {
        return $this->hasOne(Negara::className(), ['id_ngr' => 'id_ngr']);
    }
}
