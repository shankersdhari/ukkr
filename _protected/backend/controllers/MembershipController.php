<?php

namespace backend\controllers;

use Yii;
use common\models\Membership;
use common\models\MembershipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use kartik\file\FileInput;
use yii\web\UploadedFile;
use common\traits\ImageUploadTrait;
/**
 * MembershipController implements the CRUD actions for Membership model.
 */
class MembershipController extends BackendController
{
    /**
     * @inheritdoc
     */
	use ImageUploadTrait;
	public $enableCsrfValidation = false;
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
     * Lists all Membership models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembershipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Membership model.
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
     * Creates a new Membership model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Membership();

        $image = UploadedFile::getInstance($model, 'icon');
        if ($model->load(Yii::$app->request->post())) {
			if($image != '')
			{
					$newname = time();
					$name = str_replace(' ','-',strtolower($newname));
					$size = Yii::$app->params['folders']['size'];
					$main_folder = "membership";
					$image_name= $this->uploadImage($image,$name,$main_folder,$size);
					$model->icon = $image_name;
											
			}
			$model->save();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Membership has been added successfully!'));
			return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Membership model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $image_path = $model->icon;
		$image = UploadedFile::getInstance($model, 'icon');
        if ($model->load(Yii::$app->request->post())) {
            if($image != '')
			{
					$newname = time();
					$name = str_replace(' ','-',strtolower($newname));
					$size = Yii::$app->params['folders']['size'];
					$main_folder = "membership";
					$image_name= $this->uploadImage($image,$name,$main_folder,$size);
					$model->icon = $image_name;
											
			}else
			{
				$model->icon = $image_path;
			}
			$model->save();
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Membership has been updated successfully!'));
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Membership model.
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
     * Finds the Membership model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Membership the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Membership::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
