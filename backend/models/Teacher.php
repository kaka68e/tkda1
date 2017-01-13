<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property string $teacher_id
 * @property string $teacher_name
 * @property string $birthday
 * @property integer $sex
 * @property integer $id_nation
 * @property integer $id_level
 * @property string $address
 * @property string $phone
 * @property string $image
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Level $idLevel
 * @property Nation $idNation
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'teacher_name', 'birthday', 'sex', 'id_nation', 'id_level', 'address', 'phone', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['birthday'], 'safe'],
            [['sex', 'id_nation', 'id_level', 'status', 'created_at', 'updated_at'], 'integer'],
            [['teacher_id'], 'string', 'max' => 30],
            [['teacher_name', 'address'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['image'], 'string', 'max' => 255],
            [['teacher_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['id_level'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['id_level' => 'level_id']],
            [['id_nation'], 'exist', 'skipOnError' => true, 'targetClass' => Nation::className(), 'targetAttribute' => ['id_nation' => 'nation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
         return [
            'teacher_id' => 'Mã Giáo Viên',
            'teacher_name' => 'Tên Giáo Viên',
            'birthday' => 'Ngày Sinh',
            'sex' => 'Giới Tính',
            'id_nation' => 'Dân Tộc',
            'id_level' => 'Trình Độ',
            'address' => 'Địa Chỉ',
            'phone' => 'Số Điện Thoại',
            'image' => 'Hình Ảnh',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLevel()
    {
        return $this->hasOne(Level::className(), ['level_id' => 'id_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNation()
    {
        return $this->hasOne(Nation::className(), ['nation_id' => 'id_nation']);
    }
}
