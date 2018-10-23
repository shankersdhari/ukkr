<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Gallery;

/**
 * GallerySearch represents the model behind the search form about `common\models\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','gallery_id', 'status'], 'integer'],
            [['image', 'title'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$gallery_id=0, $video_id=0)
    {
        $query = Gallery::find();
		if($gallery_id){
		$query->where(['gallery_id' => $gallery_id]);	
		}
		if($video_id){
		$query->where(['id' => $video_id]);	
		}
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'gallery_id' => $this->gallery_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'gallery_id', $this->gallery_id])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
