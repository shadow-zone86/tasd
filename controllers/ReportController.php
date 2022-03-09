<?php

namespace app\controllers;

use Yii;
use app\models\AgentReport;
use app\models\EntranceReport;
use app\models\GeneratorReport;
use app\models\IndexReport;
use app\models\IndicationReport;
use app\models\MadeReport;
use app\models\Report;
use kartik\mpdf\Pdf;
use yii\web\Controller;

class ReportController extends Controller
{
    /*
     * Печать 1 карточки
     */
    public function actionCard1($id = null){
        $model = new Report();
        $sheet = $model->getSheet($id);
        $this->layout='report';
        $this->view->title='Карточка №1';
        return $this->render('card1', [
            'numberLetter' => $sheet[0]['number_letter'],
            'numberForm' => $sheet[0]['number_form'],
            'minnesotaForm' => $sheet[0]['form'],
            'numberCopy' => $sheet[0]['number_copy'],
            'xxx' => $sheet[0]['xxx'],
            'dateMade' => $sheet[0]['date_made'],
            'passport' => $sheet[0]['passport'],
            'workCtencil' => $sheet[0]['work_ctencil'],
            'ctencil' => $sheet[0]['ctencil'],
            'defectiveCtencil' => $sheet[0]['defective_ctencil'],
            'hiccupped' => $sheet[0]['hiccupped'],
            'agent' => $model->getAgent($sheet[0]['agent']),
            'index' => $sheet[0]['index'],
            'typeDocument' => $model->getTypeDocument($sheet[0]['key5']),
            'accompLetter' => $sheet[0]['accomp_letter'],
            'fasc' => $sheet[0]['fasc'],
            'block' => $sheet[0]['block'],
            'gloset' => $sheet[0]['gloset'],
            'shelf' => $sheet[0]['shelf'],
            'cell' => $sheet[0]['cell'],
            'note' => $sheet[0]['note'],
        ]);
    }

    /*
     * Печать 2 карточки
     */
    public function actionCard2($id = null){
        $model = new Report();
        $sheet = $model->getSheet($id);
        $this->layout='report';
        $this->view->title='Карточка №2';
        return $this->render('card2', [
            'index' => $sheet[0]['index'],
            'indication' => $sheet[0]['indication'],
            'accompLetter' => $sheet[0]['accomp_letter'],
            'fasc' => $sheet[0]['fasc'],
            'numberForm' => $sheet[0]['number_form'],
        ]);
    }

    /*
     * Перечень МКФ, поступивших за период
     */
    public function actionEntrance(){
        $model = new EntranceReport();
        $model->date_begin = date("d.m.Y");
        $model->date_end = date("d.m.Y");
        $model->xxx = $model->getCheckList();
        $model->type_documentation = $model->getCheckType();

        if ($model->load(Yii::$app->request->post())) {
            $sheet = $model->getSheet($model->date_begin, $model->date_end, $model->xxx, $model->type_documentation, $model->print_sign);
            $nn = count($sheet);
            if ($nn > 12000) {
                $this->layout='report';
                $this->view->title='Перечень МКФ, поступивших за период';
                return $this->render('entrancereport', [
                    'model' => $model,
                    'sheet' => $sheet,
                    'date1' => $model->date_begin,
                    'date2' => $model->date_end,
                ]);
            } else {
                $this->layout = 'report';
                Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                $this->view->title = 'Перечень МКФ, поступивших за период';
                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'format' => Pdf::FORMAT_A4,
                    'content' => $this->renderPartial('entrancereport', [
                        'model' => $model,
                        'sheet' => $sheet,
                        'date1' => $model->date_begin,
                        'date2' => $model->date_end,
                    ]),
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.img-circle {border-radius: 50%;}',
                    'options' => [
                        'title' => 'Распечатка события - Entrance Report',
                        'subject' => 'PDF'
                    ],
                    'methods' => [
                        'SetHeader' => ['Перечень МКФ, поступивших за период'],
                        'SetFooter' => ['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
        }

        $this->layout='base';
        $this->view->title='Перечень МКФ, поступивших за период';
        return $this->render('entrance', [
            'model' => $model,
            'list' => $model->getList(),
            'type' => $model->getType(),
        ]);
    }

    /*
     * Подбор МКФ по индексу изделия
     */
    public function actionIndex(){
        $model = new IndexReport();

        if ($model->load(Yii::$app->request->post())) {
            $sheet = $model->getSheet($model->index);
            $nn = count($sheet);
            if ($nn > 12000) {
                $this->layout='report';
                $this->view->title='Подбор МКФ по индексу изделия';
                return $this->render('indexreport', [
                    'sheet' => $sheet,
                    'index' => $model->index,
                ]);
            } else {
                $this->layout = 'report';
                Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                $this->view->title = 'Подбор МКФ по индексу изделия';

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'format' => Pdf::FORMAT_A4,
                    'content' => $this->renderPartial('indexreport', [
                        'sheet' => $sheet,
                        'index' => $model->index,
                    ]),
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.img-circle {border-radius: 50%;}',
                    'options' => [
                        'title' => 'Распечатка события - Index Report',
                        'subject' => 'PDF'
                    ],
                    'methods' => [
                        'SetHeader' => ['Подбор МКФ по индексу изделия'],
                        'SetFooter' => ['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
        }

        $this->layout='base';
        $this->view->title='Подбор МКФ по индексу изделия';
        return $this->render('index', [
            'model' => $model,
            'index' => $model->getIndex(),
        ]);
    }

    /*
     * Подбор МКФ по обозначению изделия
     */
    public function actionIndication(){
        $model = new IndicationReport();

        if ($model->load(Yii::$app->request->post())) {
            $sheet = $model->getSheet($model->indication);
            $nn = count($sheet);
            if ($nn > 12000) {
                $this->layout='report';
                $this->view->title='Подбор МКФ по обозначению изделия';
                return $this->render('indicationreport', [
                    'sheet' => $sheet,
                    'indication' => $model->indication,
                ]);
            } else {
                $this->layout = 'report';
                Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                $this->view->title = 'Подбор МКФ по обозначению изделия';

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'format' => Pdf::FORMAT_A4,
                    'content' => $this->renderPartial('indicationreport', [
                        'sheet' => $sheet,
                        'indication' => $model->indication,
                    ]),
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.img-circle {border-radius: 50%;}',
                    'options' => [
                        'title' => 'Распечатка события - Indication Report',
                        'subject' => 'PDF'
                    ],
                    'methods' => [
                        'SetHeader' => ['Подбор МКФ по обозначению изделия'],
                        'SetFooter' => ['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
        }

        $this->layout='base';
        $this->view->title='Подбор МКФ по обозначению изделия';
        return $this->render('indication', [
            'model' => $model,
            'indication' => $model->getIndication(),
        ]);
    }

    /*
     * Подбор МКФ по изготовителю МКФ за период
     */
    public function actionMade(){
        $model = new MadeReport();
        $model->date_begin = date("d.m.Y");
        $model->date_end = date("d.m.Y");

        if ($model->load(Yii::$app->request->post())) {
            $sheet = $model->getSheet($model->date_begin, $model->date_end, $model->made);
            $nn = count($sheet);
            if ($nn > 12000) {
                $this->layout='report';
                $this->view->title='Подбор МКФ по изготовителю МКФ за период';
                return $this->render('madereport', [
                    'model' => $model,
                    'sheet' => $sheet,
                    'date1' => $model->date_begin,
                    'date2' => $model->date_end,
                    'made_form' => $model->made,
                ]);
            } else {
                $this->layout = 'report';
                Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                $this->view->title = 'Подбор МКФ по изготовителю МКФ за период';

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'format' => Pdf::FORMAT_A4,
                    'content' => $this->renderPartial('madereport', [
                        'model' => $model,
                        'sheet' => $sheet,
                        'date1' => $model->date_begin,
                        'date2' => $model->date_end,
                        'made_form' => $model->getAgent($model->made),
                    ]),
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.img-circle {border-radius: 50%;}',
                    'options' => [
                        'title' => 'Распечатка события - Made Report',
                        'subject' => 'PDF'
                    ],
                    'methods' => [
                        'SetHeader' => ['Подбор МКФ по изготовителю МКФ за период'],
                        'SetFooter' => ['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
        }

        $this->layout='base';
        $this->view->title='Подбор МКФ по изготовителю МКФ за период';
        return $this->render('made', [
            'model' => $model,
            'made' => $model->getMade(),
        ]);
    }

    /*
     * Подбор МКФ по поставщику документации МКФ за период
     */
    public function actionAgent(){
        $model = new AgentReport();
        $model->date_begin = date("d.m.Y");
        $model->date_end = date("d.m.Y");

        if ($model->load(Yii::$app->request->post())) {
            $sheet = $model->getSheet($model->date_begin, $model->date_end, $model->agent);
            $nn = count($sheet);
            if ($nn > 12000) {
                $this->layout='report';
                $this->view->title='Подбор МКФ по поставщику документации МКФ за период';
                return $this->render('agentreport', [
                    'model' => $model,
                    'sheet' => $sheet,
                    'date1' => $model->date_begin,
                    'date2' => $model->date_end,
                    'agent' => $model->getAgent($model->agent),
                ]);
            } else {
                $this->layout = 'report';
                Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                $this->view->title = 'Подбор МКФ по поставщику документации МКФ за период';

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'format' => Pdf::FORMAT_A4,
                    'content' => $this->renderPartial('agentreport', [
                        'model' => $model,
                        'sheet' => $sheet,
                        'date1' => $model->date_begin,
                        'date2' => $model->date_end,
                        'agent' => $model->getAgent($model->agent),
                    ]),
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.img-circle {border-radius: 50%;}',
                    'options' => [
                        'title' => 'Распечатка события - Agent Report',
                        'subject' => 'PDF'
                    ],
                    'methods' => [
                        'SetHeader' => ['Подбор МКФ по поставщику документации МКФ'],
                        'SetFooter' => ['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
        }

        $this->layout='base';
        $this->view->title='Подбор МКФ по поставщику документации МКФ за период';
        return $this->render('agent', [
            'model' => $model,
            'agent' => $model->getList(),
        ]);
    }

    /*
     * Генератор отчетов
     */
    public function actionGenerator(){
        $model = new GeneratorReport();

        if ($model->load(Yii::$app->request->post())) {
            $sheet = $model->getSheet($model->type, $model->number, $model->xxx, $model->origin_number, $model->made, $model->passport, $model->provider, $model->index, $model->indication, $model->incoming_number, $model->name, $model->list_number, $model->task, $model->inventory_number);
            $nn = count($sheet);
            if ($nn > 12000) {
                $this->layout='report';
                $this->view->title='Генератор отчетов';
                return $this->render('generatorreport', [
                    'model' => $model,
                    'sheet' => $sheet,
                ]);
            } else {
                $this->layout='report';
                Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                $this->view->title='Генератор отчетов';

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'format' => Pdf::FORMAT_A4,
                    'content' => $this->renderPartial('generatorreport', [
                        'model' => $model,
                        'sheet' => $sheet,
                    ]),
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.img-circle {border-radius: 50%;}',
                    'options' => [
                        'title' => 'Распечатка события - Generator Report',
                        'subject' => 'PDF'
                    ],
                    'methods' => [
                        'SetHeader'=> ['Генератор отчетов'],
                        'SetFooter'=> ['{PAGENO}'],
                    ]
                ]);

                return $pdf->render();
            }
        }

        $this->layout='base';
        $this->view->title='Генератор отчетов';
        return $this->render('generator', [
            'model' => $model,
            'agent' => $model->getList(),
            'index' => $model->getIndex(),
            'indication' => $model->getIndication(),
            'xxx' => $model->getSecrecy(),
            'task' => $model->getAction(),
            'type' => $model->getType(),
        ]);
    }

    /*
     * Подсчет индексов изделий
     */
    public function actionCountIndex(){
        $model = new IndexReport();
        $nn = count($model->getIndex());
        if ($nn > 12000) {
            $this->layout='report';
            $this->view->title='Подсчет индексов изделий';
            return $this->render('countindexreport', [
                'index' => $model->getIndex(),
            ]);
        } else {
            $this->layout = 'report';
            Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
            $headers = Yii::$app->response->headers;
            $headers->add('Content-Type', 'application/pdf');
            $this->view->title = 'Подсчет индексов изделий';

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8,
                'format' => Pdf::FORMAT_A4,
                'content' => $this->renderPartial('countindexreport', [
                    'index' => $model->getIndex(),
                ]),
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '.img-circle {border-radius: 50%;}',
                'options' => [
                    'title' => 'Распечатка события - Index Report',
                    'subject' => 'PDF'
                ],
                'methods' => [
                    'SetHeader' => ['Подсчет индексов изделий'],
                    'SetFooter' => ['{PAGENO}'],
                ]
            ]);
            return $pdf->render();
        }
    }
}

?>