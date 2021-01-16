<?php

namespace app\models;

use Yii;
use  yii\validators\FileValidator;

/**
 * This is the model class for table "tf_lunas".
 *
 * @property int $id_tf_lunas
 * @property string $ft_lunas
 * @property string $name
 * @property string $nm_rek
 * @property int $id_bank_tjn
 * @property int $id_user
 *
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class TfLunas extends \yii\db\ActiveRecord
{
    public $foto_lunas;
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
            [[ 'name', 'nm_rek', 'id_bank_tjn'], 'required'],
             [['foto_lunas'],'file', 'extensions' => 'jpg, jpeg, png'],
            ['id_user', 'default', 'value'=> Yii::$app->user->id],
            [['id_bank_tjn', 'id_user'], 'integer'],
            [['tgl'], 'safe'],
           ['cashback', 'default', 'value'=> '0'],
              ['status', 'default', 'value'=> 'wait'],
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
             'foto_lunas' => 'Unggah Bukti Transfer',
            'name' => 'No. Rekening Anda',
            'nm_rek' => 'Nama Rekening Anda',
            'id_bank_tjn' => 'Bank Tujuan Pembayaran',
            'id_user' => 'Id User',
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
