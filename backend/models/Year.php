<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "year".
 *
 * @property string $year_id
 * @property string $year_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Year extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year_id', 'year_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['year_id'], 'string', 'max' => 30],
            [['year_name'], 'string', 'max' => 100],
            [['year_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['year_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year_id' => 'Mã Năm Học',
            'year_name' => 'Tên Năm Học',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    public $year = [];

    public function getAllYear()
    {
        $data = Year::find()->where(['status'=>'1'])->orderBy(['(created_at)' => SORT_DESC])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->year[$item->year_id] = 'Khóa : '.$item->year_id.' - Năm học : '.$item->year_name;
            }
        }
        return $this->year;
    }
}
