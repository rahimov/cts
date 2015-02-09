<?php

namespace api\versions\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class CatController extends ActiveController
{
	public $modelClass = 'api\versions\v1\models\Cat';

	public function behaviors()
	{
		$behaviors = parent::behaviors();
//		$behaviors['authenticator'] = [
//			'class' => QueryParamAuth::className(),
//		];
		return $behaviors;
	}
}