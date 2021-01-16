<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tf_lunas".
 *
 * @property int $id_tf_lunas
 * @property string $ft_lunas
 * @property string $name
 * @property string $nm_rek
 * @property int $id_bank_tjn
 * @property int $id_user
 * @property int $cashback
 * @property string $status
 * @property string $tgl
 *
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class TfLunas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tf_lunas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ft_lunas', 'name', 'nm_rek', 'id_bank_tjn', 'cashback', 'status'], 'required'],
            [['id_bank_tjn', 'id_user', 'cashback'], 'integer'],
            [['status'], 'string'],
            [['tgl'], 'safe'],
            [['ft_lunas', 'name', 'nm_rek'], 'string', 'max' => 30],
            [['id_bank_tjn'], 'exist', 'skipOnError' => true, 'targetClass' => BankTujuan::className(), 'targetAttribute' => ['id_bank_tjn' => 'id_bank_tjn']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tf_lunas' => 'Id Tf Lunas',
            'ft_lunas' => 'Ft Lunas',
            'name' => 'Name',
            'nm_rek' => 'Nm Rek',
            'id_bank_tjn' => 'Id Bank Tjn',
            'id_user' => 'Id User',
            'cashback' => 'Cashback',
            'status' => 'Status',
            'tgl' => 'Tgl',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankTjn()
    {
        return $this->hasOne(BankTujuan::className(), ['id_bank_tjn' => 'id_bank_tjn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
