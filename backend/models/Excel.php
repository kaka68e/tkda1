<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "excel".
 *
 * @property integer $excel_id
 * @property string $excel_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Excel extends \yii\db\ActiveRecord
{
    public $file1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'excel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['excel_name', 'excel_category', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['excel_name', 'excel_category'], 'string', 'max' => 250],
            [['file1'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'excel_id' => 'Mã Excel',
            'excel_name' => 'Tên Excel',
            'excel_category' => 'Danh mục',
            'status' => 'Kích hoạt',
            'created_at' => 'Ngày upload',
            'updated_at' => 'Ngày cập nhật',
        ];
    }
}
