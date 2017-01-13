<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property string $subject_id
 * @property string $subject_name
 * @property integer $id_block
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Study[] $studies
 * @property Block $idBlock
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'subject_name', 'id_block', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['id_block', 'status', 'created_at', 'updated_at'], 'integer'],
            [['subject_id'], 'string', 'max' => 30],
            [['subject_name'], 'string', 'max' => 100],
            [['subject_name'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['subject_id'], 'unique', 'targetAttribute' => 'subject_id','message'=>'{attribute} đã tồn tại'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Mã Môn Học',
            'subject_name' => 'Tên Môn Học',
            'id_block' => 'Khối học',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudies()
    {
        return $this->hasMany(Study::className(), ['id_subject' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBlock()
    {
        return $this->hasOne(Block::className(), ['block_id' => 'id_block']);
    }

    public $subject = [];

    public function getAllSubject()
    {
        $data = Subject::find()->where(['status'=>'1'])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->subject[$item->subject_id] = "Mã: ".$item->subject_id." - ".$item->subject_name;
            }
        }
        return $this->subject;
    }

    public $subject2 = [];

    public function getAllSubjectByBlock($id_block)
    {
        $data2 = Subject::find()->where(['status'=>'1','id_block'=>$id_block])->all();
        if ($data2) {
            foreach ($data2 as $item) {
                $this->subject2[$item->subject_id] = "Mã: ".$item->subject_id." - ".$item->subject_name;
            }
        }
        return $this->subject2;
    }
}
