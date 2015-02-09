<?php
namespace api\versions\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class PhotoController extends ActiveController
{
	public $modelClass = 'api\versions\v1\models\Photo';

	public function behaviors()
	{
		$behaviors = parent::behaviors();
//		$behaviors['authenticator'] = [
//			'class' => QueryParamAuth::className(),
//		];
		return $behaviors;
	}

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'api\versions\v1\controllers\action\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'create' => [
                'class' => 'yii\rest\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'yii\rest\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'delete' => [
                'class' => 'yii\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}