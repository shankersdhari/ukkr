<?php

namespace backend\controllers;

use Yii;
use common\models\GalleryMain;
use common\models\GalleryMainSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use kartik\file\FileInput;
use yii\web\UploadedFile;
use common\traits\ImageUploadTrait;
/**
 * GalleryMainController implements the CRUD actions for GalleryMain model.
 */
class GalleryMainController extends BackendController
{
    use ImageUploadTrait;
    /**
     * @inheritdoc
     */
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
     * Lists all GalleryMain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalleryMainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GalleryMain model.
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
     * Creates a new GalleryMain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryMain();
        $image = UploadedFile::getInstance($model, 'image');
        if ($model->load(Yii::$app->request->post()) ) {
            if($image != '')
            {
                $newname = time();
                $name = str_replace(' ','-',strtolower($newname));
                $size = Yii::$app->params['folders']['size'];
                $main_folder = "gallery-main";
                $image_name= $this->uploadImage($image,$name,$main_folder,$size);
                $model->image = $image_name;
            }
            if(!$model->save()){
                echo"<pre>";print_r($model->getErrors());die;
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GalleryMain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image_path = $model->image;
        $image = UploadedFile::getInstance($model, 'image');
        if ($model->load(Yii::$app->request->post())) {
            if($image != '')
            {
                $newname =$image->name;
                $name = str_replace(' ','-',strtolower($newname));
                $size = Yii::$app->params['folders']['size'];
                $main_folder = "gallery-main";
                $image_name= $this->uploadImage($image,$name,$main_folder,$size);
                $model->image = $image_name;

            }else
            {
                $model->image = $image_path;
            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GalleryMain model.
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
     * Finds the GalleryMain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryMain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryMain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
