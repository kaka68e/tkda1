<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "term".
 *
 * @property integer $term_id
 * @property string $term_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Term extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'term';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['term_name'], 'string', 'max' => 100],
            [['term_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'term_id' => 'Mã Kỳ Học',
            'term_name' => 'Tên Kỳ Học',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    public $term = [];

    public function getAllTerm()
    {
        $data = Term::find()->where(['status'=>'1'])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->term[$item->term_id] = $item->term_name;
            }
        }
        return $this->term;
    }
}
