<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "courses".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $name
 * @property string $qualification
 * @property string $combination
 * @property string $contact_person
 * @property integer $status
 * @property integer $created_at
 *
 * @property CourseCategory $cat
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'qualification', 'combination', 'contact_person'], 'required'],
            [['cat_id', 'status', 'created_at'], 'integer'],
            [['name', 'qualification', 'combination', 'contact_person'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseCategory::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'name' => 'Name',
            'qualification' => 'Qualification',
            'combination' => 'Combination',
            'contact_person' => 'Contact Person',
            'status' => 'Status',
            'created_at' => 'Create At',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(CourseCategory::className(), ['id' => 'cat_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCats()
    {
        $cat_child = CourseCategory::where(['status' => 1])->all();
        return ArrayHelper::map($cat_child,'id','name');
    }
}
