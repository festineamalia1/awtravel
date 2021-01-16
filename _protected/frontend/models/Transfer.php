<?php

namespace app\models;

use Yii;
use  yii\validators\FileValidator;

/**
 * This is the model class for table "transfer".
 *
 * @property int $id_transfer
 * @property string $ft_trans
 * @property string $name
 * @property string $nm_rek
 * 
 * @property int $cicilan_ke
 * @property int $id_bank_tjn
 * @property int $id_user
 *
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class Transfer extends \yii\db\ActiveRecord
{
    public $foto_trans;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'besar','name', 'nm_rek', 'cicilan_ke', 'id_bank_tjn'], 'required'],
            [['foto_trans'],'file', 'extensions' => 'jpg, jpeg, png'],
             ['id_user', 'default', 'value'=> Yii::$app->user->id],
            [['besar','cicilan_ke', 'id_bank_tjn', 'id_user'], 'integer'],
            [['ft_trans', 'name', 'nm_rek'], 'string', 'max' => 30],
             [['tgl'], 'safe'],
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
            'id_transfer' => 'Id Transfer',
            'ft_trans' => 'Unggah Bukti Transfer',
            'foto_trans' => 'Unggah Bukti Transfer',
            'name' => 'No Rekening',
            'nm_rek' => 'Nama Rekening',
           'besar' => 'Besar',
            'cicilan_ke' => 'Cicilan Ke',
            'id_bank_tjn' => 'Bank Tujuan',
            'id_user' => 'Id User',
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
