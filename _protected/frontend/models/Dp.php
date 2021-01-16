<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dp".
 *
 * @property int $id_dp
 * @property int $jml_dp
 *
 * @property Negara[] $negaras
 */
class Dp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jml_dp'], 'required'],
            [['jml_dp'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dp' => 'Id Dp',
            'jml_dp' => 'Jml Dp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegaras()
    {
        return $this->hasMany(Negara::className(), ['id_dp' => 'id_dp']);
    }
}
