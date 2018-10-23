<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id
 * @property string $deprt
 * @property string $name
 * @property integer $status
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deprt', 'name'], 'required'],
            [['status'], 'integer'],
            [['deprt', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deprt' => 'Department',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
    public function getAllDepartments(){
        return  array(
            "Arts" => "Arts",
            "Commerce" => "Commerce",
            "Science" => "Science",
            "Staff" => "Staff",
            "Student" => "Student",
        );
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Staff::className(), ['sub_department' => 'id']);
    }
}
