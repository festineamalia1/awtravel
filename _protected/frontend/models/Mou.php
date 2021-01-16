<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mou".
 *
 * @property int $id_mou
 * @property string $pasal
 * @property string $ket
 * @property int $id_user
 *
 * @property User $user
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
            [['pasal', 'ket', 'id_user'], 'required'],
            [['ket'], 'string'],
            [['id_user'], 'integer'],
            [['pasal'], 'string', 'max' => 20],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
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
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
