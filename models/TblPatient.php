<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_patient".
 *
 * @property int $patient_id ไอดีผู้ป่วย
 * @property string $ref_patient_id รหัสอ้างอิงผู้ป่วยในฐานข้อมูล imed
 * @property string $hn รหัสประจำตัวคนไข้ในรพ.
 * @property string|null $cid เลขบัตรประจำตัวประชาชน
 * @property string|null $prename คำนำหน้า
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property string|null $birthdate ว/ด/ป เกิด
 * @property string|null $mobile เบอร์โทรศัพท์
 * @property string|null $email อีเมล
 * @property int|null $age อายุ
 * @property int $created_by ผู้บันทึก
 * @property int $updated_by ผู้แก้ไข
 * @property string $created_at วันที่บันทึก
 * @property string $updated_at วันที่แก้ไข
 */
class TblPatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref_patient_id', 'hn', 'firstname', 'lastname', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['birthdate', 'created_at', 'updated_at'], 'safe'],
            [['age', 'created_by', 'updated_by'], 'integer'],
            [['ref_patient_id', 'hn', 'prename', 'email'], 'string', 'max' => 100],
            [['cid'], 'string', 'max' => 13],
            [['firstname', 'lastname'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'ref_patient_id' => 'Ref Patient ID',
            'hn' => 'Hn',
            'cid' => 'Cid',
            'prename' => 'Prename',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'age' => 'Age',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
