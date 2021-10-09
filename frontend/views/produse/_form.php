<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categorii;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Produse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produs_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>


    <?= $form->field($model, 'produs_categorie')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Categorii::find()->all(), 'id', 'categorie_denumire'),
        'language' => 'de',
        'options' => ['placeholder' => 'Selecteaza o categorie ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>



    <?= $form->field($model, 'produs_pret')->textInput() ?>

    <?= $form->field($model, 'produs_is_active')->textInput() ?>

    <?= $form->field($model, 'produs_stock')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
