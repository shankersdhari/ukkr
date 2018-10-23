<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "latest_news".
 *
 * @property integer $id
 * @property string $name
 * @property string $publish_date
 * @property string $description
 * @property integer $status
 * @property string $created_at
 */
class LatestNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'latest_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'publish_date', 'description'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['publish_date', 'created_at'], 'safe'],
            [['description'], 'string', 'max' => 1000],
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
            'publish_date' => 'Publish Date',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
            ],
        ];
    }
}
