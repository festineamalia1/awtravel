<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inex".
 *
 * @property int $id_inex
 * @property string $include
 * @property string $exclude
 *
 * @property Negara[] $negaras
 */
class Inex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['include', 'exclude'], 'required'],
            [['include', 'exclude'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_inex' => 'Id Inex',
            'include' => 'Include',
            'exclude' => 'Exclude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegaras()
    {
        return $this->hasMany(Negara::className(), ['id_inex' => 'id_inex']);
    }
}
