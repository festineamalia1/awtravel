<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $password_hash
 * @property string $auth_key
 * @property int $status
 * @property string $password_reset_token
 * @property int $created_at
 * @property int $updated_at
 * @property int $id_level
 *
 * @property Admin[] $admins
 * @property Peserta[] $pesertas
 * @property TbLevel $level
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_hash', 'auth_key', 'status', 'password_reset_token', 'created_at', 'updated_at', 'id_level'], 'required'],
            [['status', 'created_at', 'updated_at', 'id_level'], 'integer'],
            [['username', 'email'], 'string', 'max' => 30],
            [['password', 'password_hash', 'auth_key', 'password_reset_token'], 'string', 'max' => 50],
            [['id_level'], 'exist', 'skipOnError' => true, 'targetClass' => TbLevel::className(), 'targetAttribute' => ['id_level' => 'id_level']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_level' => 'Id Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admin::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertas()
    {
        return $this->hasMany(Peserta::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(TbLevel::className(), ['id_level' => 'id_level']);
    }
}
