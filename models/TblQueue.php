<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_queue".
 *
 * @property int $queue_id ไอดีคิว
 * @property string $queue_no หมายเลขคิว
 * @property int $patient_id ไอดีผู้ป่วย
 * @property int|null $appoint_id ไอดีนัดหมาย
 * @property string $qrcode_id คิวอาร์โค้ด
 * @property string|null $checkin_status สถานะเช็คอิน
 * @property string|null $checkin_time เวลาเช็คอิน
 * @property int|null $prefix_id ตัวอักษรนำหน้าเลขคิว
 * @property int $created_by ผู้บันทึก
 * @property int $updated_by ผู้แก้ไข
 * @property string $created_at วันที่บันทึก
 * @property string $updated_at วันที่แก้ไข
 */
class TblQueue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['queue_no', 'patient_id', 'qrcode_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['patient_id', 'appoint_id', 'prefix_id', 'created_by', 'updated_by'], 'integer'],
            [['checkin_time', 'created_at', 'updated_at'], 'safe'],
            [['queue_no'], 'string', 'max' => 100],
            [['qrcode_id'], 'string', 'max' => 255],
            [['checkin_status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'queue_id' => 'Queue ID',
            'queue_no' => 'Queue No',
            'patient_id' => 'Patient ID',
            'appoint_id' => 'Appoint ID',
            'qrcode_id' => 'Qrcode ID',
            'checkin_status' => 'Checkin Status',
            'checkin_time' => 'Checkin Time',
            'prefix_id' => 'Prefix ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
