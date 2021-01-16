<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tf_dp".
 *
 * @property int $id_tfdp
 * @property string $ft_dp
 * @property string $name
 * @property string $nm_rek
 * @property int $id_bank_tjn
 * @property int $id_user
 * @property string $status
 * @property string $tgl
 *
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class TfDp extends \yii\db\ActiveRecord
{
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
            [['ft_dp', 'name', 'nm_rek', 'id_bank_tjn', 'status'], 'required'],
            [['id_bank_tjn', 'id_user'], 'integer'],
            [['status'], 'string'],
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
            'name' => 'Name',
            'nm_rek' => 'Nm Rek',
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
