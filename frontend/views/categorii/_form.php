<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categorie_denumire')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'categorie_is_active')->dropDownList(
        ['0' => 'Inactiva', '1' => 'Activa']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
