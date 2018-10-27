<?php

namespace backend\controllers;

use Yii;
use common\models\Gallery;
use common\models\GalleryMain;
use common\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use kartik\file\FileInput;
use yii\web\UploadedFile;
use common\traits\ImageUploadTrait;
/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends BackendController
{
    /**
     * @inheritdoc
     */
	use ImageUploadTrait;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gallery models.
     * @return mixed
     */
	public function actionUpdateimage($idd=0,$slider_id=0)
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idd);
		$model = new Gallery();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'model' => $model,
			'slider_id' => $slider_id,
        ]);
        }
      
    }
	public function actionViewImages($gallery_id=0)
    {
		
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$gallery_id);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'gallery_id' => $gallery_id,
        ]);
    }
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($gallery_id=0)
    {
        $model = new Gallery();
		$image = UploadedFile::getInstance($model, 'image');
        if ($model->load(Yii::$app->request->post())) {
            $model->gallery_id = $gallery_id;
			if($image != '')
			{
					$newname = time();
					$name = str_replace(' ','-',strtolower($newname));
					$size = Yii::$app->params['folders']['size'];
					$main_folder = "gallery";
					$image_name= $this->uploadImage($image,$name,$main_folder,$size);
					$model->image = $image_name;
											
			}
			$model->save();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Image has been added successfully!'));
			return $this->redirect(['view-images', 'gallery_id' => $gallery_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'gallery_id' => $gallery_id,
            ]);
        }
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$gallery_id=0)
    {
        $model = $this->findModel($id,$gallery_id);
		$image_path = $model->image;
		$image = UploadedFile::getInstance($model, 'image');
        if ($model->load(Yii::$app->request->post())) {
            if($image != '')
			{
					$newname =$image->name;
					$name = str_replace(' ','-',strtolower($newname));
					$size = Yii::$app->params['folders']['size'];
					$main_folder = "gallery";
					$image_name= $this->uploadImage($image,$name,$main_folder,$size);
					$model->image = $image_name;
											
			}else
			{
				$model->image = $image_path;
			}
			$model->save();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Image has been updated successfully!'));
            return $this->redirect(['view-images', 'gallery_id' => $gallery_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'gallery_id' => $gallery_id,
            ]);
        }
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
