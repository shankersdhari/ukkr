<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting_text_values".
 *
 * @property integer $id
 * @property integer $setting_id
 * @property integer $setting_attribute_id
 * @property string $value
 *
 * @property SettingAttributes $settingAttribute
 * @property Settings $setting
 */
class SettingTextValues extends \yii\db\ActiveRecord
{
	
	public $attributes;
	public $img;
	public $video;
		public $content;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting_text_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting_id', 'setting_attribute_id'], 'required'],
            [['setting_id', 'setting_attribute_id'], 'integer'],
            [['value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setting_id' => 'Setting ID',
            'setting_attribute_id' => 'Setting Attribute ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettingAttribute()
    {
        return $this->hasOne(SettingAttributes::className(), ['id' => 'setting_attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetting()
    {
        return $this->hasOne(Settings::className(), ['id' => 'setting_id']);
    }
}
