<?php

namespace api\versions\v1\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

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
			[['intro', 'description','address'], 'string'],
			[['description'], 'required'],
			[['published'], 'integer'],
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
			'address' => 'Address',
			'published' => 'Published',
			'createdon' => 'Createdon',
			'editedon' => 'Editedon',
		];
	}

	public function getPhotos()
	{
		// Cat has_many Photo via Photo.cat_id -> id
		return $this->hasMany(Photo::className(), ['cat_id' => 'id']);
	}

	public function getPhoto()
	{
		return $this->hasOne(Photo::className(), ['cat_id' => 'id'])->where(['sort' => 1]);
	}

	public function fields(){
		$fields = parent::fields();
		$fields[]='photo';
		return $fields;
	}

	public function extraFields()
	{
		return ['photos'];
	}

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['createdon', 'editedon'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['editedon'],
				],
				'value' => new Expression('NOW()'),
			],
		];
	}
}