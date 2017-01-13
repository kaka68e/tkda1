<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $student_id
 * @property string $student_name
 * @property string $birthday
 * @property integer $sex
 * @property string $disabilities
 * @property integer $id_nation
 * @property string $parent_name
 * @property string $address
 * @property string $phone
 * @property string $image
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Nation $idNation
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'student_name', 'birthday', 'sex', 'id_nation', 'parent_name', 'address', 'phone', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['birthday'], 'safe'],

            [['birthday'],'date', 'format'=>'yyyy-mm-dd'],
            [['sex', 'id_nation', 'status', 'created_at', 'updated_at'], 'integer'],
            [['student_id'], 'string', 'max' => 30],
            [['student_name', 'parent_name', 'address'], 'string', 'max' => 100],
            [['disabilities', 'image'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['student_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['id_nation'], 'exist', 'skipOnError' => true, 'targetClass' => Nation::className(), 'targetAttribute' => ['id_nation' => 'nation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Mã Học Sinh*',
            'student_name' => 'Tên Học Sinh*',
            'birthday' => 'Ngày Sinh*',
            'sex' => 'Giới Tính',
            'disabilities' => 'Khuyết Tật',
            'id_nation' => 'Dân Tộc*',
            'parent_name' => 'Tên Cha Mẹ*',
            'address' => 'Địa Chỉ*',
            'phone' => 'Số Điện Thoại*',
            'image' => 'Hình Ảnh',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNation()
    {
        return $this->hasOne(Nation::className(), ['nation_id' => 'id_nation']);
    }

   
}
