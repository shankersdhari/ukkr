<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "membership".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $cost
 * @property string $background
 * @property string $description
 * @property integer $status
 */
class Membership extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membership';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
            [['cost', 'background'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 2500],
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
            'icon' => 'Icon',
            'cost' => 'Cost',
            'background' => 'Background',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
