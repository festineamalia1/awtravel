<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mou".
 *
 * @property int $id_mou
 * @property string $pasal
 * @property string $ket
 * @property int $id_admin
 *
 * @property Admin $admin
 */
class Mou extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mou';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasal', 'ket', 'id_admin'], 'required'],
            [['ket'], 'string'],
            [['id_admin'], 'integer'],
            [['pasal'], 'string', 'max' => 20],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mou' => 'Id Mou',
            'pasal' => 'Pasal',
            'ket' => 'Ket',
            'id_admin' => 'Id Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
}
