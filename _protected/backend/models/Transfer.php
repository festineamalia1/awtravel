<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property int $id_transfer
 * @property int $besar
 * @property string $ft_trans
 * @property string $name
 * @property string $nm_rek
 * @property int $cicilan_ke
 * @property int $id_bank_tjn
 * @property int $id_user
 * @property string $status
 * @property string $tgl
 *
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class Transfer extends \yii\db\ActiveRecord
{
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
            [['besar', 'ft_trans', 'name', 'nm_rek', 'cicilan_ke', 'id_bank_tjn', 'status'], 'required'],
            [['besar', 'cicilan_ke', 'id_bank_tjn', 'id_user'], 'integer'],
            [['status'], 'string'],
            [['tgl'], 'safe'],
            [['ft_trans', 'name', 'nm_rek'], 'string', 'max' => 30],
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
            'besar' => 'Besar',
            'ft_trans' => 'Ft Trans',
            'name' => 'Name',
            'nm_rek' => 'Nm Rek',
            'cicilan_ke' => 'Cicilan Ke',
            'id_bank_tjn' => 'Id Bank Tjn',
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
