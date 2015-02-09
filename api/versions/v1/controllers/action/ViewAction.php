<?php
namespace api\versions\v1\controllers\action;

use Yii;
use yii\data\ActiveDataProvider;

class ViewAction extends \yii\rest\ViewAction
{
    public $prepareDataProvider;


    /**
     * @return ActiveDataProvider
     */
    public function run($id)
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        return $this->prepareDataProvider($id);
    }

    /**
     * Prepares the data provider that should return the requested collection of the models.
     * @return ActiveDataProvider
     */
    protected function prepareDataProvider($id)
    {
        if ($this->prepareDataProvider !== null) {
            return call_user_func($this->prepareDataProvider, $this);
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        return new ActiveDataProvider([
            'query' => $modelClass::find()
                    ->where(['cat_id' => $id]),
        ]);
    }
}
