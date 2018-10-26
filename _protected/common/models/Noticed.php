<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
            [['content', 'start_date', 'end_date'], 'required'],
            [['start_date', 'end_date', 'status', 'created_at'], 'safe'],
            [['content'], 'string', 'max' => 1000],
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
