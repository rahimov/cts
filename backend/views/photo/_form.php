<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'createdon')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
