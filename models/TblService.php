<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_service".
 *
 * @property int $service_id ไอดีงานบริการ
 * @property string $service_name ชื่องานบริการ
 * @property string|null $service_code รหัสงานบริการ
 * @property int $service_group_id รหัสกลุ่มงานบริการ
 * @property int $service_num_digit จำนวนหลักเลขคิว
 * @property int $ticket_id ไอดีบัตรคิว
 * @property int|null $service_no ลำดับ
 * @property int $service_status สถานะ
 * @property string|null $icon_base_url ลิงค์หลักไอคอน
 * @property string|null $icon_path ที่อยู่ไอคอน
 * @property int|null $show_on_kiosk แสดงบนตู้กดบัตรคิว
 */
class TblService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_name', 'service_group_id', 'service_num_digit', 'ticket_id', 'service_status'], 'required'],
            [['service_group_id', 'service_num_digit', 'ticket_id', 'service_no', 'service_status', 'show_on_kiosk'], 'integer'],
            [['service_name', 'service_code', 'icon_base_url', 'icon_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'service_name' => 'Service Name',
            'service_code' => 'Service Code',
            'service_group_id' => 'Service Group ID',
            'service_num_digit' => 'Service Num Digit',
            'ticket_id' => 'Ticket ID',
            'service_no' => 'Service No',
            'service_status' => 'Service Status',
            'icon_base_url' => 'Icon Base Url',
            'icon_path' => 'Icon Path',
            'show_on_kiosk' => 'Show On Kiosk',
        ];
    }
}
