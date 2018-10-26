<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "noticed".
 *
 * @property integer $id
 * @property string $content
 * @property integer $start_date
 * @property integer $end_date
 * @property integer $status
 * @property integer $created_at
 */
class Noticed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'start_date', 'end_date', 'created_at'], 'required'],
            [['start_date', 'end_date', 'status', 'created_at'], 'integer'],
            [['content'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
