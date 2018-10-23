<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $designation
 * @property integer $contact
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name', 'designation', 'contact'], 'required'],
            [[ 'status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'name', 'department','contact', 'designation'], 'string', 'max' => 250],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'designation' => 'Designation',
            'contact' => 'Contact',
            'status' => 'Status',
            'department' => 'Department',
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    public function getDesignations(){
       return  array(
            "Principal" => "Principal",
            "Security" => "Security",
            "Time Table Inchage" => "Time Table Inchage",
            "Hostel Boys" => "Hostel Boys",
            "Hostel Girls" => "Hostel Girls",
            "Web Site Manager" => "Web Site Manager",
            "Library" => "Library",
            "Alumni" => "Alumni",
            "Office Superintendent" => "Office Superintendent",
            "Accounts Dept" => "Accounts Dept",
            "Steno to Principal" => "Steno to Principal",
            "Fee Section" => "Fee Section",
            "Procotrial" => "Procotrial",
            "NCC incharge [Boys]" => "NCC incharge [Boys]",
            "NCC incharge [Girls]" => "NCC incharge [Girls]",
            "Press Release" => "Press Release",
            "Office Clerk" => "Office Clerk",
        );
    }
    public function getDepartments(){
        return  array(
            "Arts" => "Arts",
            "Commerce" => "Commerce",
            "Science" => "Science",
        );
    }
}
