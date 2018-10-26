<?php

namespace backend\controllers;

use Yii;
use common\models\Staff;
use common\models\StaffSearch;
use common\models\Departments;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\imagine\Image;
use kartik\file\FileInput;
use yii\web\UploadedFile;
use common\traits\ImageUploadTrait;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends BackendController
{
    use ImageUploadTrait;
    public $enableCsrfValidation = false;
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
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
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();
        $departments = Departments::findAll(['deprt' => "Arts"]);
        $image = UploadedFile::getInstance($model, 'image');
        if ($model->load(Yii::$app->request->post())) {
            if($image != '')
            {
                $newname = time();
                $name = str_replace(' ','-',strtolower($newname));
                $size = Yii::$app->params['folders']['size'];
                $main_folder = "member
                ";
                $image_name= $this->uploadImage($image,$name,$main_folder,$size);
                $model->image = $image_name;

            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'departments' => ArrayHelper::map($departments,'id','name'),
            ]);
        }
    }

    public function actionActiveDepartments($id)
    {
        $model = Departments::findAll(['status' => 1, 'deprt' => $id]);
        $staff = new Staff();
        $sub_dprt = "";
        $designation = "";
        if($model){
            foreach($model as $depts){
                $sub_dprt .= "<option value='".$depts->id."'>".$depts->name."</option>";
            }
        }
        if($id == "Student"){
            $designation .= "<option value='Student'>Student</option>";
        }else{
            foreach($staff->designations as $key => $designations){
                $designation .= "<option value='".$key."'>".$designations."</option>";
            }
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'sub_department' => $sub_dprt,
            'designation' => $designation,
        ];
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $departments = Departments::findAll(['deprt' => $model->department]);
        $image_path = $model->image;
        $image = UploadedFile::getInstance($model, 'image');
        if ($model->load(Yii::$app->request->post())) {
            if($image != '')
            {
                $newname =$image->name;
                $name = str_replace(' ','-',strtolower($newname));
                $size = Yii::$app->params['folders']['size'];
                $main_folder = "member";
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
                'departments' => ArrayHelper::map($departments,'id','name'),
            ]);
        }
    }

    /**
     * Deletes an existing Staff model.
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
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
