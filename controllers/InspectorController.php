<?php

namespace app\controllers;

use Yii;
use app\models\Sheet;
use app\models\search\InspectorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InspectorController implements the CRUD actions for Sheet model.
 */
class InspectorController extends Controller
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
     * Lists all Sheet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Sheet();
        $searchModel = new InspectorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 15];

        $this->layout='base';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'rowsCount' => $model->getRows(),
        ]);
    }

    /**
     * Displays a single Sheet model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout='base';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sheet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sheet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout='base';
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sheet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->user = \Yii::$app->user->identity->username;
        $model->date_time = Date('d.m.Y');
        $model->date_check = Date('d.m.Y');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout='base';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sheet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sheet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sheet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sheet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Clear filter.
     * @return mixed
     */
    public function actionClearFilter()
    {
        $session = Yii::$app->session;
        if ($session->has('InspectorSearch')) {
            $session->remove('InspectorSearch');
        }
        if ($session->has('InspectorSearchSort')) {
            $session->remove('InspectorSearchSort');
        }

        return $this->redirect('index');
    }
}
