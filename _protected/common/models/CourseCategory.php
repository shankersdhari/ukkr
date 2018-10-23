<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $status
 *
 * @property Courses[] $courses
 */
class CourseCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['status'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['cat_id' => 'id']);
    }
}
