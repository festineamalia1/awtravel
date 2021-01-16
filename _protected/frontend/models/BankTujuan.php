<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_tujuan".
 *
 * @property int $id_bank_tjn
 * @property string $nm_bank
 * @property string $nomor_rek
 * @property string $nama_rek
 *
 * @property DtTransaksi[] $dtTransaksis
 * @property Transfer[] $transfers
 */
class BankTujuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_tujuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_bank', 'nomor_rek', 'nama_rek'], 'required'],
            [['nm_bank'], 'string', 'max' => 50],
            [['nomor_rek', 'nama_rek'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bank_tjn' => 'Id Bank Tjn',
            'nm_bank' => 'Nm Bank',
            'nomor_rek' => 'Nomor Rek',
            'nama_rek' => 'Nama Rek',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtTransaksis()
    {
        return $this->hasMany(DtTransaksi::className(), ['id_bank_tjn' => 'id_bank_tjn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['id_bank_tjn' => 'id_bank_tjn']);
    }

    public function getTfDps()
    {
        return $this->hasMany(TfDp::className(), ['id_bank_tjn' => 'id_bank_tjn']);
    }
}
