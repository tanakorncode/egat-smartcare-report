<?php
/*
 * Created by VS Code.
 * User: Tanakorn Phompak
 * Date: Thu Jul 30 2020
 * Time: 23:20:51
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\TblPatient;
use app\models\TblQueue;
use app\models\TblQueueDetail;
use app\models\TblTicket;
use app\models\TblService;
use app\models\TblServiceGroup;
use yii\web\NotFoundHttpException;

class QueueController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionPrintTicket($id)
    {
        $formatter = Yii::$app->formatter;
        $queueDetail = TblQueueDetail::findOne($id);
        if (!$queueDetail) {
            throw new NotFoundHttpException('ไม่พบข้อมูลคิว.');
        }
        $queue = TblQueue::findOne($queueDetail['queue_id']);
        $patient = TblPatient::findOne($queue['patient_id']);
        $service = TblService::findOne($queueDetail['service_id']);
        $group = TblServiceGroup::findOne($service['service_group_id']);
        $ticket = TblTicket::findOne($service['ticket_id']);
        $queue_time = $formatter->asDate($queueDetail['queue_time'], 'php:d F ') . ($formatter->asDate($queueDetail['queue_time'], 'php:Y') + 543) . ' ' . $formatter->asDate($queueDetail['queue_time'], 'php:H:i น.');
        $ticket_template = strtr($ticket['ticket_template'], [
            '{hn}' => $patient['hn'], // เลขประจำตัวผู้ป่วย
            '{queue}' => $queue['queue_no'], // หมายเลขคิว
            '{service_group_name}' => $group['service_group_name'], // ชื่อแผนก
            '{name}' => $patient['prename'] . $patient['firstname'] . ' ' . $patient['lastname'], // ชื่อ สกุล ผู้ป่วย
            '{date}' => $queue_time
        ]);
        return $this->renderAjax('print-ticket', [
            'template' => $ticket_template
        ]);
    }
}
