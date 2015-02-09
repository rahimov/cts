<?php

namespace api\versions\v1\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

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
			[['file'], 'string'],
			[['file'], 'required'],
			[['cat_id', 'sort'], 'integer'],
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
			'cat_id' => 'CatID',
			'name' => 'Name',
			'file' => 'File',
			'sort' => 'Sort',
			'createdon' => 'Createdon',
		];
	}

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['createdon'],
				],
				'value' => new Expression('NOW()'),
			],
		];
	}


}