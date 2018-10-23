<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "upcoming_confrence".
 *
 * @property integer $id
 * @property string $name
 * @property string $event_date
 * @property string $description
 * @property string $featured_image
 * @property integer $status
 */
class UpcomingConfrence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upcoming_confrence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'event_date', 'description'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['event_date', 'featured_image'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 2550],
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
            'event_date' => 'Event Date',
            'description' => 'Description',
            'featured_image' => 'Featured Image',
            'status' => 'Status',
        ];
    }
}
