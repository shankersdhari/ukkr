<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "university".
 *
 * @property integer $id
 * @property string $name
 * @property string $sname
 * @property integer $uni_type_id
 * @property integer $city_id
 * @property integer $state_id
 * @property integer $country_id
 * @property string $logo
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cities $city
 * @property UniType $uniType
 */
class Finder extends \yii\db\ActiveRecord
{
	 public $category;
    public $step;
    public $general_attrs;
    public $optional_attrs;
    public $feat_image;

    public $featured_image;
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','size_width_id', 'slug', 'category_id', 'article_id','quantity', 'price', 'market_price', 'descr'], 'required'],
            [['category_id','featured', 'quantity', 'status', 'soldout', 'created_at', 'updated_at','size_width_id'], 'integer'],
            [['descr', 'short_descr', 'meta_description'], 'string'],
            ['general_attrs', 'required',
                'message' => 'Please select one option.'
            ],
            [['optional_attrs'], 'safe'],
            [['price','market_price'], 'number'],
            [['slug'], 'unique'],
            [['name','article_id'], 'string', 'max' => 110],
            [['meta_title', 'meta_keyword','article_id','slug'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
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
            'name' => 'Name',
            'category_id' => 'Category',
            'category_id' => 'Category ID',
            'varient_id' => 'Varient ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'market_price' => 'Market Price',
            'descr' => 'Description',
            'short_descr' => 'Short Description',
            'descr' => 'Descr',
            'short_descr' => 'Short Descr',
            'article_id' => 'Article id',
            'slug' => 'Slug',
            'status' => 'Status',
            'is_variant' => 'Is Variant',
            'soldout' => 'Soldout',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'article_id' => 'Article ID',
            'size_width_id' => 'Size width Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategories(){
        $cat = Category::find()->where(['status' => 1])->orderBy('name')->all();
        return ArrayHelper::map($cat,'id','name');
    }

    public function getProductDescValues()
    {
        return $this->hasMany(ProductDescValues::className(), ['product_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizeWidth()
    {
        return $this->hasOne(Sizewidth::className(), ['id' => 'size_width_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDropdownValues()
    {
        return $this->hasMany(ProductDropdownValues::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasOne(ProductImages::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSliderValues()
    {
        return $this->hasMany(ProductSliderValues::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTextValues()
    {
        return $this->hasMany(ProductTextValues::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVarientProducts()
    {
        return $this->hasMany(VarientProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
    public function getSpecialProducts()
    {

        $product = $this->find()->where(['status' => 1])->orderBy('name')->all();

        return ArrayHelper::map($product,'id','name');
    }

    public function getSizeWidthGroup()
    {
        $group = Sizewidth::find()->orderBy('name')->all();
        return ArrayHelper::map($group,'id','name');
    }
}
