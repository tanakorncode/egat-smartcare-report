<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_ticket".
 *
 * @property int $ticket_id ไอดีบัตรคิว
 * @property string $ticket_name ชื่อบัตรคิว
 * @property string $ticket_template code
 * @property int $ticket_status สถานะ
 */
class TblTicket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_name', 'ticket_template', 'ticket_status'], 'required'],
            [['ticket_template'], 'string'],
            [['ticket_status'], 'integer'],
            [['ticket_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => 'Ticket ID',
            'ticket_name' => 'Ticket Name',
            'ticket_template' => 'Ticket Template',
            'ticket_status' => 'Ticket Status',
        ];
    }
}
