<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "summary".
 *
 * @property string $id_classroom
 * @property string $id_student
 * @property double $average_mark
 * @property integer $average_conduct
 * @property integer $rating
 * @property integer $confirm
 * @property string $comment
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Classroom $idClassroom
 * @property Student $idStudent
 */
class Summary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'id_student', 'average_mark', 'average_conduct', 'rating', 'confirm', 'created_at', 'updated_at'], 'required'],
            [['average_mark'], 'number'],
            [['average_conduct', 'rating', 'confirm', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_classroom', 'id_student'], 'string', 'max' => 30],
            [['comment'], 'string', 'max' => 255],
            [['id_classroom'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['id_classroom' => 'classroom_id']],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['id_student' => 'student_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_classroom' => 'Mã lớp',
            'id_student' => 'Mã học sinh',
            'average_mark' => 'Điểm cả năm',
            'average_conduct' => 'Hạnh kiểm',
            'rating' => 'Đánh giá',
            'confirm' => 'Xác nhận',
            'comment' => 'Nhận xét',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClassroom()
    {
        return $this->hasOne(Classroom::className(), ['classroom_id' => 'id_classroom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' => 'id_student']);
    }
}
