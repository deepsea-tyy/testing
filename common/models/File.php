<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%file}}".
 *
 * @property int $f_id
 * @property int $mime_id
 * @property int $id
 * @property int $o_id
 * @property string $file_url
 * @property int $photo_width
 * @property int $photo_hight
 * @property int $created_by
 * @property int $created_at
 * @property int $file_size
 * @property int $status 1 有用
 *
 * @property Mime $mime
 * @property User $id0
 * @property Orderform $o
 * @property OrderformRemark[] $orderformRemarks
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_id', 'created_at'], 'required'],
            [['f_id', 'mime_id', 'id', 'o_id', 'photo_width', 'photo_hight', 'created_by', 'created_at', 'file_size', 'status'], 'integer'],
            [['file_url'], 'string', 'max' => 255],
            [['f_id'], 'unique'],
            [['mime_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mime::className(), 'targetAttribute' => ['mime_id' => 'mime_id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['o_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orderform::className(), 'targetAttribute' => ['o_id' => 'o_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'f_id' => 'F ID',
            'mime_id' => 'Mime ID',
            'id' => 'ID',
            'o_id' => 'O ID',
            'file_url' => 'File Url',
            'photo_width' => 'Photo Width',
            'photo_hight' => 'Photo Hight',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'file_size' => 'File Size',
            'status' => '1 有用
            0 删除的',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMime()
    {
        return $this->hasOne(Mime::className(), ['mime_id' => 'mime_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getO()
    {
        return $this->hasOne(Orderform::className(), ['o_id' => 'o_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderformRemarks()
    {
        return $this->hasMany(OrderformRemark::className(), ['f_id' => 'f_id']);
    }

    /**
     * @inheritdoc
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }
}