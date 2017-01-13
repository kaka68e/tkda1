<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "block".
 *
 * @property integer $block_id
 * @property string $block_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['block_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['block_name'], 'string', 'max' => 100],
            [['block_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'block_id' => 'Mã Khối Học',
            'block_name' => 'Tên Khối Học',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }
    /**
    * Lấy ra danh sách khối học
    */
    public $block = [];

    public function getAllBlock()
    {
        $data = Block::find()->where(['status'=>'1'])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->block[$item->block_id] = $item->block_name;
            }
        }
        return $this->block;
    }
}
