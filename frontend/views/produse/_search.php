<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProduseSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="produse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'produs_denumire') ?>

    <?= $form->field($model, 'produs_imagine') ?>

    <?= $form->field($model, 'produs_categorie') ?>

    <?= $form->field($model, 'produs_pret') ?>

    <?php // echo $form->field($model, 'produs_is_active') ?>

    <?php // echo $form->field($model, 'produs_stock') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
