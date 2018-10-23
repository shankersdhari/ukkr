<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
/**
 * This is the model class for table "recent_confrence".
 *
 * @property integer $id
 * @property string $name
 * @property string $event_date
 * @property string $description
 * @property string $featured_image
 * @property integer $gallery
 * @property integer $status
 */
class RecentConfrence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recent_confrence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'event_date', 'description'], 'required'],
            [['gallery', 'status'], 'integer'],
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
            'gallery' => 'Gallery',
            'status' => 'Status',
        ];
    }
	public function getGalleries()
	{
		$gallery = GalleryMain::find()->where(['status' => 1])->orderBy('galley_name')->all();
		$arr = array();
		$merge =  ArrayHelper::map($gallery,'id','galley_name');

		return $merge;
	}
	public function getGallery()
    {
        return $this->hasOne(GalleryMain::className(), ['id' => 'gallery']);
    }
}
