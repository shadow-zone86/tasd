<?php

namespace app\controllers;

use app\models\Index;
use Yii;
use app\models\Sheet;
use app\models\search\SheetSearch;
use yii\bootstrap\ActiveForm;
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
                    'delete' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Small lists all sheet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Sheet();
        $searchModel = new SheetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 15];

        $this->layout='base';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'secrecy' => $model->getSecrecy(),
            'mkf' => $model->getForm(),
            'agent' => $model->getAgent(),
            'index' => $model->getIndex(),
            'indication' => $model->getIndication($model->index),
            'attribute' => $model->getDocumentationAttribute(),
            'action' => $model->getAction(),
            'window' => 'index',
            'rowsCount' => $model->getRows(),
        ]);
    }

    /**
     * Bigger lists all sheet models.
     * @return mixed
     */
    public function actionBigger()
    {
        $model = new Sheet();
        $searchModel = new SheetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 15];

        $this->layout='base';
        return $this->render('bigger', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'secrecy' => $model->getSecrecy(),
            'mkf' => $model->getForm(),
            'agent' => $model->getAgent(),
            'index' => $model->getIndex(),
            'indication' => $model->getIndication($model->index),
            'attribute' => $model->getDocumentationAttribute(),
            'action' => $model->getAction(),
            'window' => 'bigger',
            'rowsCount' => $model->getRows(),
        ]);
    }

    /**
     * Displays a single sheet model.
     * @param string $id
     * @param string $window
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $window)
    {
        $model = $this->findModel($id);
        $modelIndex = new Index();

        $this->layout='base';
        return $this->render('view', [
            'model' => $model,
            'disable' => true,
            'indication' => $model->getIndication($model->index),
            'secrecy' => $model->getSecrecy(),
            'agent' => $model->getAgent(),
            'index' => $model->getIndex(),
            'action' => $model->getAction(),
            'attribute' => $model->getDocumentationAttribute(),
            'type' => $model->getType($id),
            'modelIndex' => $modelIndex,
            'window' => $window,
        ]);
    }

    /**
     * Creates a new sheet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param string $type
     * @param string $window
     * @return mixed
     */
    public function actionCreate($type, $window)
    {
        $model = new Sheet();
        $modelIndex = new Index();

        $model->user = \Yii::$app->user->identity->username;
        $model->date_time = Date('d.m.Y');
        $model->form = $model->getTitle($type);
        $model->number_form = "095";
        $model->read = '0.0000';
        $model->density = '0.0000';
        $model->na2so3 = '0.0000';
        $model->ag = '0.0000';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'window' => $window]);
        }

        $this->layout='base';
        return $this->render('create', [
            'model' => $model,
            'disable' => false,
            'indication' => $model->getIndication($model->index),
            'secrecy' => $model->getSecrecy(),
            'agent' => $model->getAgent(),
            'index' => $model->getIndex(),
            'action' => $model->getAction(),
            'attribute' => $model->getDocumentationAttribute(),
            'type' => $type,
            'window' => $window,
            'title' => $model->getTitle($type),
            'number' => $model->getNumber(),
            'modelIndex' => $modelIndex,
        ]);
    }

    /**
     * Updates an existing sheet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $window
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $window)
    {
        $model = $this->findModel($id);
        $modelIndex = new Index();

        $model->user = \Yii::$app->user->identity->username;
        $model->date_time = Date('d.m.Y');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'window' => $window]);
        }

        $this->layout='base';
        return $this->render('update', [
            'model' => $model,
            'disable' => false,
            'indication' => $model->getIndication($model->index),
            'number' => $model->getNumber(),
            'secrecy' => $model->getSecrecy(),
            'agent' => $model->getAgent(),
            'index' => $model->getIndex(),
            'action' => $model->getAction(),
            'attribute' => $model->getDocumentationAttribute(),
            'type' => $model->getType($id),
            'modelIndex' => $modelIndex,
            'window' => $window,
        ]);
    }

    /**
     * Deletes an existing sheet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $window
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $window)
    {
        $this->findModel($id)->delete();

        \Yii::$app->session->setFlash('report_message', '
            <div class="alert alert-success" role="alert">
                Запись успешно удалена!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');

        $this->layout='base';
        switch ($window) {
            case 'index':
                return $this->redirect('index');
                break;
            case 'bigger':
                return $this->redirect('bigger');
                break;
            default:
                return $this->redirect('index');
                break;
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

    /**
     * Returns a list of designations by product index.
     * @param string $id
     * @return mixed
     */
    public function actionLists($id)
    {
        $model = new Sheet();
        $countIndex = $model->getCountIndex($id);
        $indexes = $model->getIndexes($id);
        if ($countIndex > 0) {
            echo "<option>Укажите обозначение изделия ...</option>";
            foreach ($indexes as $index) {
                echo "<option value='".$index->litera."'>".$index->litera."</option>";
            }
        } else {
            echo "<option> - </option>";
        }
    }

    /**
     * Clear filter.
     * @param string $window
     * @return mixed
     */
    public function actionClearFilter($window)
    {
        $session = Yii::$app->session;
        if ($session->has('SheetSearch')) {
            $session->remove('SheetSearch');
        }
        if ($session->has('SheetSearchSort')) {
            $session->remove('SheetSearchSort');
        }

        switch ($window) {
            case 'index':
                return $this->redirect('index');
                break;
            case 'bigger':
                return $this->redirect('bigger');
                break;
            default:
                return $this->redirect('index');
                break;
        }
    }

    /**
     * Creates a new index model in modal window.
     * @return mixed
     */
    public function actionModal()
    {
        $model = new Index();
        $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            $url = $this->getCurrentUrl();
            return $this->redirect($url);
        }

        $this->setCurrentUrl();

        if (Yii::$app->request->isAjax){
            return $this->renderAjax('modal', [
                'model' => $model,
            ]);
        } else {
            return $this->render('modal', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Setter URI.
     * @return mixed
     */
    public function setCurrentUrl()
    {
        $session = Yii::$app->session;
        $session->set('Index', Yii::$app->request->referrer);
    }

    /**
     * Getter URI.
     * @return mixed
     */
    public function getCurrentUrl()
    {
        $session = Yii::$app->session;
        if ($session['Index'])
            return $session['Index'];
        return 'index';
    }
}
