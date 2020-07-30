<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_queue_detail".
 *
 * @property int $queue_detail_id ไอดี
 * @property int $queue_id ไอดีคิว
 * @property int|null $service_id ไอดีงานบริการ
 * @property int $queue_type_id ประเภทคิว
 * @property int $queue_status_id สถานะคิว
 * @property string $queue_time เวลาทำรายการ
 * @property string $register_by ทำรายการจาก kiosk, mobile หรือ user
 * @property int $doctor_id ไอดีแพทย์
 * @property string|null $draw_blood เจาะเลือด
 * @property string|null $xray เอ็กซเรย์
 * @property int $created_by ผู้บันทึก
 * @property int $updated_by ผู้แก้ไข
 * @property string $created_at วันที่บันทึก
 * @property string $updated_at วันที่แก้ไข
 */
class TblQueueDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_queue_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['queue_id', 'queue_type_id', 'queue_status_id', 'queue_time', 'register_by', 'doctor_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['queue_id', 'service_id', 'queue_type_id', 'queue_status_id', 'doctor_id', 'created_by', 'updated_by'], 'integer'],
            [['queue_time', 'created_at', 'updated_at'], 'safe'],
            [['register_by', 'draw_blood', 'xray'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'queue_detail_id' => 'Queue Detail ID',
            'queue_id' => 'Queue ID',
            'service_id' => 'Service ID',
            'queue_type_id' => 'Queue Type ID',
            'queue_status_id' => 'Queue Status ID',
            'queue_time' => 'Queue Time',
            'register_by' => 'Register By',
            'doctor_id' => 'Doctor ID',
            'draw_blood' => 'Draw Blood',
            'xray' => 'Xray',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
