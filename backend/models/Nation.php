<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nation".
 *
 * @property integer $nation_id
 * @property string $nation_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Nation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nation_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['nation_name'], 'string', 'max' => 100],
            [['nation_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nation_id' => 'Mã Dân Tộc',
            'nation_name' => 'Tên Dân Tộc',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }
    /**
    * 
    */
    public $nation = [];

    public function getAllNation()
    {
        $data = Nation::find()->where(['status'=>'1'])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->nation[$item->nation_id] = $item->nation_name;
            }
        }
        return $this->nation;
    }
}
