<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "studentclass".
 *
 * @property string $id_classroom
 * @property string $id_student
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Classroom $idClassroom
 * @property Student $idStudent
 */
class Studentclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studentclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'id_student', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['id_classroom', 'id_student'], 'string', 'max' => 30],
            [['id_classroom'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['id_classroom' => 'classroom_id'],'message'=>'{attribute} không có trong bảng DS Lớp Học'],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['id_student' => 'student_id'],'message'=>'{attribute} không có trong bảng Lý Lịch Học Sinh'],

            [['id_classroom', 'id_student'], 'unique', 'targetAttribute' => ['id_classroom', 'id_student'], 'message' => Yii::t('app', 'Duplicated Data Entries.')],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_classroom' => 'Lớp Học',
            'id_student' => 'Học Sinh',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Cập Nhật',
            'updated_at' => 'Ngày Kích Hoạt',
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


     public $student = [];

    public function getAllStudetByClassroom($classroom_id)
    {
        $data3 = Studentclass::find()->where(['status'=>'1','id_classroom'=>$classroom_id])->all();
        if ($data3) {
            foreach ($data3 as $item) {
                $name = Student::find()->where(['status'=>1,'student_id'=>$item->id_student])->one();
                $this->student[$item->id_student] = 'Mã: '.$item->id_student.' - Họ tên: '.$name['student_name'];
            }
        }
        return $this->student;
    }
}
