<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property int $id_peserta
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $no_tlp
 * @property int $id_user
 *
 * @property DtTransaksi[] $dtTransaksis
 * @property User $user
 * @property Transfer[] $transfers
 */
class Peserta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'email', 'no_tlp', 'id_user'], 'required'],
            [['alamat'], 'string'],
            [['id_user'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30],
            [['no_tlp'], 'string', 'max' => 20],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_peserta' => 'Id Peserta',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'no_tlp' => 'No Tlp',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtTransaksis()
    {
        return $this->hasMany(DtTransaksi::className(), ['id_peserta' => 'id_peserta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['id_peserta' => 'id_peserta']);
    }
}
