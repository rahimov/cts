<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $name
 * @property string $description
 * @property string $file
 * @property integer $sort
 * @property integer $createdon
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'sort', 'createdon'], 'integer'],
            [['name', 'description', 'file'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['file'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'name' => 'Name',
            'description' => 'Description',
            'file' => 'File',
            'sort' => 'Sort',
            'createdon' => 'Createdon',
        ];
    }
}
