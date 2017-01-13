<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teacherclass".
 *
 * @property string $id_classroom
 * @property string $id_teacher
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Classroom $idClassroom
 * @property Teacher $idTeacher
 */
class Teacherclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacherclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'id_teacher', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['id_classroom', 'id_teacher'], 'string', 'max' => 30],
            [['id_classroom'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['id_classroom' => 'classroom_id'],'message'=>'{attribute} không có trong bảng DS Lớp Học'],
            [['id_teacher'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['id_teacher' => 'teacher_id'],'message'=>'{attribute} không có trong bảng Lý Lịch Giáo Viên'],

             [['id_classroom', 'id_teacher'], 'unique', 'targetAttribute' => ['id_classroom', 'id_teacher'], 'message' => Yii::t('app', 'Duplicated Data Entries.')],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_classroom' => 'Lớp Học',
            'id_teacher' => 'Giáo Viên',
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
    public function getIdTeacher()
    {
        return $this->hasOne(Teacher::className(), ['teacher_id' => 'id_teacher']);
    }
}
