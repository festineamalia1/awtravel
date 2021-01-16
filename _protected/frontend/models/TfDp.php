<?php

namespace app\models;

use Yii;
use  yii\validators\FileValidator;

/**
 * This is the model class for table "tf_dp".
 *
 * @property int $id_tfdp
 * @property string $ft_dp
 * @property string $name
 * @property string $nm_rek
 * @property int $id_bank_tjn
 * @property int $id_user
 *
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class TfDp extends \yii\db\ActiveRecord
{
    public $foto_dp;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tf_dp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'nm_rek', 'id_bank_tjn'], 'required'],
            [['foto_dp'],'file', 'extensions' => 'jpg, jpeg, png'],
              ['id_user', 'default', 'value'=> Yii::$app->user->id],
              ['status', 'default', 'value'=> 'wait'],
            [['id_bank_tjn', 'id_user'], 'integer'],
            [['tgl'], 'safe'],
            [['ft_dp', 'name', 'nm_rek'], 'string', 'max' => 30],
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
            'id_tfdp' => 'Id Tfdp',
            'ft_dp' => 'Ft Dp',
            'foto_dp' => 'Unggah Bukti Transfer',
            'name' => 'No. Rekening',
            'nm_rek' => 'Nama Rekening',
            'id_bank_tjn' => 'Pilih Bank Tujuan',
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
