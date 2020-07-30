<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_service_group".
 *
 * @property int $service_group_id ไอดีกลุ่มงานบริการ
 * @property string $service_group_name ชื่อกลุ่มงานบริการ
 * @property int|null $service_group_no ลำดับการแสดงผล
 * @property int $service_group_status สถานะ
 * @property string|null $icon_base_url ลิงค์ที่อยู่ไอคอน
 * @property string|null $icon_path ที่อยู่ไอคอน
 * @property string $module_name ชื่อโมดูล
 */
class TblServiceGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_service_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_group_name', 'service_group_status', 'module_name'], 'required'],
            [['service_group_no', 'service_group_status'], 'integer'],
            [['service_group_name', 'icon_base_url', 'icon_path'], 'string', 'max' => 255],
            [['module_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_group_id' => 'Service Group ID',
            'service_group_name' => 'Service Group Name',
            'service_group_no' => 'Service Group No',
            'service_group_status' => 'Service Group Status',
            'icon_base_url' => 'Icon Base Url',
            'icon_path' => 'Icon Path',
            'module_name' => 'Module Name',
        ];
    }
}
