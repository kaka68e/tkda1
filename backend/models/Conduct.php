<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conduct".
 *
 * @property string $id_classroom
 * @property integer $id_term
 * @property string $id_student
 * @property integer $rating
 * @property string $comment
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Classroom $idClassroom
 * @property Student $idStudent
 * @property Term $idTerm
 */
class Conduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'id_term', 'id_student', 'rating', 'created_at', 'updated_at'], 'required'],
            [['id_term', 'rating', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_classroom', 'id_student'], 'string', 'max' => 30],
            [['comment'], 'string', 'max' => 255],
            [['id_classroom'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['id_classroom' => 'classroom_id']],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['id_student' => 'student_id']],
            [['id_term'], 'exist', 'skipOnError' => true, 'targetClass' => Term::className(), 'targetAttribute' => ['id_term' => 'term_id']],

            [['id_classroom', 'id_term','id_student'], 'unique', 'targetAttribute' => ['id_classroom', 'id_term','id_student'],'message'=>'{attribute} Đã có 1 bản ghi gồm 4 trường này'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_classroom' => 'Lớp Học',
            'id_term' => 'Kỳ Học',
            'id_student' => 'Học Sinh',
            'rating' => 'Hạnh Kiểm',
            'comment' => 'Nhận xét',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerm()
    {
        return $this->hasOne(Term::className(), ['term_id' => 'id_term']);
    }
}
