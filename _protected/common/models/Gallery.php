<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $image
 * @property string $title
 * @property integer $status
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status','gallery_id'], 'integer'],
            [['image', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'title' => 'Title',
            'gallery_id' => 'Gallery Name',
            'status' => 'Status',
        ];
    }
	public function getGallery()
    {
        return $this->hasOne(GalleryMain::className(), ['id' => 'gallery_id']);
    }
}
