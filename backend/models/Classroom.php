<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "classroom".
 *
 * @property string $classroom_id
 * @property string $id_year
 * @property integer $id_block
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Block $idBlock
 * @property Year $idYear
 * @property Studentclass[] $studentclasses
 * @property Student[] $idStudents
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classroom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classroom_id', 'id_year', 'id_block', 'created_at', 'updated_at'], 'required'],
            [['id_block', 'status', 'created_at', 'updated_at'], 'integer'],
            [['classroom_id', 'id_year'], 'string', 'max' => 30],
            [['classroom_id'], 'unique'],
            [['id_block'], 'exist', 'skipOnError' => true, 'targetClass' => Block::className(), 'targetAttribute' => ['id_block' => 'block_id']],
            [['id_year'], 'exist', 'skipOnError' => true, 'targetClass' => Year::className(), 'targetAttribute' => ['id_year' => 'year_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classroom_id' => 'Mã Lớp Học',
            'id_year' => 'Mã Năm Học',
            'id_block' => 'Mã Khối Học',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBlock()
    {
        return $this->hasOne(Block::className(), ['block_id' => 'id_block']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdYear()
    {
        return $this->hasOne(Year::className(), ['year_id' => 'id_year']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentclasses()
    {
        return $this->hasMany(Studentclass::className(), ['id_classroom' => 'classroom_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudents()
    {
        return $this->hasMany(Student::className(), ['student_id' => 'id_student'])->viaTable('studentclass', ['id_classroom' => 'classroom_id']);
    }

    public $classroom = [];

    public function getAllClassroom()
    {
        $data = Classroom::find()->where(['status'=>'1'])->orderBy(['(created_at)' => SORT_DESC])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->classroom[$item->classroom_id] = 'Mã lớp: ---  '.$item->classroom_id;
            }
        }
        return $this->classroom;
    }

    public $classroom2 = [];

    public function getAllClassroomByYear($year_id)
    {
        $data2 = Classroom::find()->where(['status'=>'1','id_year'=>$year_id])->orderBy(['(created_at)' => SORT_DESC])->all();
        if ($data2) {
            foreach ($data2 as $item) {
                $this->classroom2[$item->classroom_id] = 'Mã lớp: ---  '.$item->classroom_id;
            }
        }
        return $this->classroom2;
    }
}
