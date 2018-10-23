<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_main".
 *
 * @property integer $id
 * @property string $galley_name
 * @property integer $image
 * @property string $status
 */
class GalleryMain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['galley_name'], 'required'],
            [['image'], 'string', 'max' => 250],
            [['galley_name', 'status'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'galley_name' => 'Galley Name',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
}
