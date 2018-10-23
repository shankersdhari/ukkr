<?php

namespace backend\controllers;

use Yii;
use common\models\Members;
use common\models\Category;
use common\models\MembersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MembersController implements the CRUD actions for Members model.
 */
class MembersController extends BackendController
{
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
     * Lists all Members models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionViewmembers($cat_id=0)
    {
		
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$cat_id);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'cat' => Category::findOne($cat_id),
        ]);
    }
    /**
     * Displays a single Members model.
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
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cat_id=0)
    {
        $model = new Members();

        if ($model->load(Yii::$app->request->post())) {
			$model->cat_id = $cat_id;
			$model->save();
			Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Member has been created successfully!'));
            return $this->redirect(['viewmembers', 'cat_id' => $model->cat_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cat_id' => $cat_id,
            ]);
        }
    }

    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$cat_id=0)
    {
        $model = $this->findModel($id,$cat_id);

        if ($model->load(Yii::$app->request->post())) {
			$model->cat_id = $cat_id;
			$model->save();
			Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Member has been updated successfully!'));
            return $this->redirect(['viewmembers', 'cat_id' => $model->cat_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				 'cat_id' => $cat_id,
            ]);
        }
    }

    /**
     * Deletes an existing Members model.
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
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Members::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
