<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $id_foto
 * @property int $id_ngr
 * @property string $name
 * @property string $ft
 * @property string $ket
 *
 * @property Negara $ngr
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $foto;
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ngr', 'name', 'ft', 'ket'], 'required'],
            [['id_ngr'], 'integer'],
            [['name', 'ft'], 'string', 'max' => 30],
            [['ket'], 'string', 'max' => 50],
            [['id_ngr'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_ngr' => 'id_ngr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_foto' => 'Id Foto',
            'id_ngr' => 'Id Ngr',
            'name' => 'Name',
            'ft' => 'Ft',
            'ket' => 'Ket',
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
