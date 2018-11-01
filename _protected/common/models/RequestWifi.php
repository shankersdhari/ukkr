<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\captcha\Captcha;
/**
 * This is the model class for table "{{%request_wifi}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $rollno
 * @property string $class
 * @property string $msg
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class RequestWifi extends \yii\db\ActiveRecord
{
    public $captcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_wifi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'rollno', 'class', 'captcha'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            //[['captcha'], 'captcha'],
            [['name', 'email', 'phone', 'rollno', 'class', 'msg'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'rollno' => 'Rollno',
            'class' => 'Class',
            'captcha' => 'Verification Code',
            'msg' => 'Msg',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    /**
     * Sends an email to the specified email address using the information
     * collected by this model.
     *
     * @param  string $email The target email address.
     * @return bool          Whether the email was sent.
     */
    public function contactWifi($email)
    {
        $adminEmail = Yii::$app->params['adminEmail'];
        $message = $this->msg;

        $send=  Yii::$app->mailer->compose(['html' => '@common/mail/views/contact'], ['name'=>$this->name, 'email'=>$this->email, 'phone'=>$this->phone, 'message'=>$message])
            ->setTo($adminEmail)
            ->setFrom($this->email)
            ->setSubject('Requesting Wifi Password')
            ->send();
        return $send;

    }
}
