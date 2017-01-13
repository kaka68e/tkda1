<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $level_id
 * @property string $level_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['level_name'], 'string', 'max' => 100],
            [['level_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Mã Trình Độ',
            'level_name' => 'Tên Trình Độ',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    public $level = [];

    public function getAllLevel()
    {
        $data = Level::find()->where(['status'=>'1'])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->level[$item->level_id] = $item->level_name;
            }
        }
        return $this->level;
    }
}
