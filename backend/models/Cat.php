<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat".
 *
 * @property integer $id
 * @property string $name
 * @property string $intro
 * @property string $description
 * @property integer $gender
 * @property integer $published
 * @property integer $createdon
 * @property integer $editedon
 */
class Cat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intro', 'description'], 'string'],
            [['description', 'gender', 'published', 'createdon', 'editedon'], 'required'],
            [['gender', 'published', 'createdon', 'editedon'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'intro' => 'Intro',
            'description' => 'Description',
            'gender' => 'Gender',
            'published' => 'Published',
            'createdon' => 'Createdon',
            'editedon' => 'Editedon',
        ];
    }
}
