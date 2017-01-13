<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "study".
 *
 * @property string $id_classroom
 * @property integer $id_term
 * @property string $id_student
 * @property string $id_subject
 * @property integer $result
 * @property string $comment
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Classroom $idClassroom
 * @property Student $idStudent
 * @property Subject $idSubject
 * @property Term $idTerm
 */
//Cũ ở trên
/**
 * This is the model class for table "study".
 *
 * @property string $id_classroom
 * @property integer $id_term
 * @property string $id_student
 * @property string $id_subject
 * @property double $result
 * @property string $comment
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Classroom $idClassroom
 * @property Student $idStudent
 * @property Subject $idSubject
 * @property Term $idTerm
 */
class Study extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'study';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'id_term', 'id_student', 'id_subject', 'result', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['id_term', 'status', 'created_at', 'updated_at'], 'integer'],
            [['result'], 'number'],
            [['id_classroom', 'id_student', 'id_subject'], 'string', 'max' => 30],
            [['comment'], 'string', 'max' => 255],
            [['id_classroom'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['id_classroom' => 'classroom_id']],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['id_student' => 'student_id']],
            [['id_subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['id_subject' => 'subject_id']],
            [['id_term'], 'exist', 'skipOnError' => true, 'targetClass' => Term::className(), 'targetAttribute' => ['id_term' => 'term_id']],
            [['id_classroom', 'id_term','id_student','id_subject'], 'unique', 'targetAttribute' => ['id_classroom', 'id_term','id_student','id_subject'],'message'=>'{attribute} Đã có 1 bản ghi gồm 4 trường này'],

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
            'id_subject' => 'Môn Học',
            'result' => 'Kết quả',
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
    public function getIdSubject()
    {
        return $this->hasOne(Subject::className(), ['subject_id' => 'id_subject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerm()
    {
        return $this->hasOne(Term::className(), ['term_id' => 'id_term']);
    }
}
