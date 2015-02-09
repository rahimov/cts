<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'published')->textInput() ?>

    <?= $form->field($model, 'createdon')->textInput() ?>

    <?= $form->field($model, 'editedon')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
