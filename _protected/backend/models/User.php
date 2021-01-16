<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $password_reset_token
 * @property int $id_level
 *
 * @property Admin[] $admins
 * @property Peserta[] $pesertas
 * @property TbLevel $level
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
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
           // [['username', 'password', 'auth_key', 'password_reset_token', 'id_level'], 'required'],
            [['username', 'password', 'id_level'], 'required'],
            [['id_level'], 'integer'],
            [['username'], 'string', 'max' => 30],
           // [['password', 'auth_key', 'password_reset_token'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 50],
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
           
           'password_reset_token' => 'Password Reset Token',
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

     public static function findIdentity($id){
        return static::findOne($id);
    }
 
    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException();
    }
 
    public function getId(){
        return $this->id_user;
    }
 
    public function getAuthKey(){
        return $this->auth_key;
    }

      public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
 
    public function validateAuthKey($authKey){
        return $this->auth_key === $authKey;
    }
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
 
    public function validatePassword($password){
        return $this->password === $password;
    }

   
}
