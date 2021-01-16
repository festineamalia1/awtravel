<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keperluan".
 *
 * @property int $id_prl
 * @property string $keprl
 * @property int $biaya
 * @property int $id_iti
 *
 * @property Itinerary $iti
 */
class Keperluan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keperluan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keprl', 'biaya', 'id_iti'], 'required'],
            [['biaya', 'id_iti'], 'integer'],
            [['keprl'], 'string', 'max' => 50],
            [['id_iti'], 'exist', 'skipOnError' => true, 'targetClass' => Itinerary::className(), 'targetAttribute' => ['id_iti' => 'id_iti']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prl' => 'Id Prl',
            'keprl' => 'Keprl',
            'biaya' => 'Biaya',
            'id_iti' => 'Id Iti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIti()
    {
        return $this->hasOne(Itinerary::className(), ['id_iti' => 'id_iti']);
    }
}
