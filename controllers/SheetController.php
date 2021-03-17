<?php

namespace app\controllers;

use app\models\Index;
use Yii;
use app\models\Sheet;
use app\models\SheetSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * SheetController implements the CRUD actions for sheet model.
 */
class SheetController extends Controller
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
     * Lists all sheet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SheetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 15];

        $this->layout='base';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single sheet model.
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
     * Creates a new sheet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sheet();

//        $model->id = sheet::find()->select('max(id)')->scalar()+1;
        $model->user = \Yii::$app->user->identity->username;
        $model->date_time = Date('d.m.Y');
        $model->form = "Рулонный микрофильм";
        $model->number_form = "095";
        $model->read = '0.0000';
        $model->density = '0.0000';
        $model->na2so3 = '0.0000';
        $model->ag = '0.0000';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout='base';
        return $this->render('create', [
            'model' => $model,
            'arr' => [],
        ]);
    }

    public function actionCreate1()
    {
        $model = new Sheet();

//        $model->id = sheet::find()->select('max(id)')->scalar()+1;
        $model->user = \Yii::$app->user->identity->username;
        $model->date_time = Date('d.m.Y');
        $model->form = "Микрофиша";
        $model->number_form = "095";
        $model->read = '0.0000';
        $model->density = '0.0000';
        $model->na2so3 = '0.0000';
        $model->ag = '0.0000';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout='base';
        return $this->render('create1', [
            'model' => $model,
            'arr' => [],
        ]);
    }

    /**
     * Updates an existing sheet model.
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout='base';
        return $this->render('update', [
            'model' => $model,
            'arr' => ArrayHelper::map(Index::find()->where(['index'=>$model->index])->all(), 'litera', 'litera'),
        ]);
    }

    /**
     * Deletes an existing sheet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $this->layout='base';
        return $this->redirect(['index']);
    }

    public function actionLists($id) {
        $countPosts = Index::find()->where(['index' => $id])->count();
        $posts = Index::find()->where(['index' => $id])->orderBy('litera ASC')->all();
        if ($countPosts > 0) {
            echo "<option>Укажите обозначение изделия</option>";
            foreach ($posts as $post) {
                echo "<option value='".$post->litera."'>".$post->litera."</option>";
            }
        } else {
            echo "<option> - </option>";
        }
    }

    /**
     * Finds the sheet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return sheet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sheet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
