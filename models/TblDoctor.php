<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_doctor".
 *
 * @property int $doctor_id ไอดี
 * @property string $doctor_eid
 * @property string|null $prename คำนำหน้า
 * @property string $first_name ชื่อ
 * @property string $last_name นามสกุล
 * @property string|null $profession_code
 * @property string|null $intername
 * @property string|null $service_ids
 * @property int|null $user_type
 * @property string|null $service_point_id
 */
class TblDoctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_eid', 'first_name', 'last_name'], 'required'],
            [['user_type'], 'integer'],
            [['doctor_eid', 'prename', 'profession_code', 'service_point_id'], 'string', 'max' => 100],
            [['first_name', 'last_name', 'intername', 'service_ids'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'doctor_eid' => 'Doctor Eid',
            'prename' => 'Prename',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'profession_code' => 'Profession Code',
            'intername' => 'Intername',
            'service_ids' => 'Service Ids',
            'user_type' => 'User Type',
            'service_point_id' => 'Service Point ID',
        ];
    }
}
