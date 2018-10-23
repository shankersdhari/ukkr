<?php

namespace backend\controllers;

use Yii;
use common\models\Downloads;
use common\models\DownloadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\traits\FileUploadTrait;
use yii\imagine\Image;
use kartik\file\FileInput;
use yii\web\UploadedFile;
/**
 * DownloadsController implements the CRUD actions for Downloads model.
 */
class DownloadsController extends BackendController
{
    /**
     * @inheritdoc
     */
	use FileUploadTrait;
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
     * Lists all Downloads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DownloadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Downloads model.
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
     * Creates a new Downloads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Downloads();
		$image = UploadedFile::getInstance($model, 'file');
        if ($model->load(Yii::$app->request->post())) {
			if($image != '')
			{
					
					$name = $image->name;
					$size = Yii::$app->params['folders']['size'];
					$main_folder = "downloads";
					$image_name= $this->uploadFile($image,$name,$main_folder,$size);
					$model->file = $image_name;
											
			}
			$model->save();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'File has been created successfully!'));
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Downloads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$file = $model->file;
		$image = UploadedFile::getInstance($model, 'file');
        if ($model->load(Yii::$app->request->post())) {
            if($image != '')
			{
					
					$name = $image->name;
					$size = Yii::$app->params['folders']['size'];
					$main_folder = "downloads";
					$image_name= $this->uploadFile($image,$name,$main_folder,$size);
					$model->file = $image_name;
											
			}else{
				$model->file = $file; 
			}
			$model->save();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'File has been updated successfully!'));
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Downloads model.
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
     * Finds the Downloads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Downloads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Downloads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
