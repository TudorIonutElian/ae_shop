<?php


use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categorii;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $model app\models\Produse */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="produse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produs_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>


    <?= $form->field($model, 'produs_categorie')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Categorii::find()->where(['categorie_is_active' => 1])->all(), 'id', 'categorie_denumire'),
        'language' => 'de',
        'options' => ['placeholder' => 'Selecteaza o categorie ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>

    <?= $form->field($model, 'produs_pret')->textInput() ?>
    <?php
    echo $form->field($model, 'produs_is_active')->dropDownList(
        ['0' => 'Inactiv', '1' => 'Activ']
    ); ?>

    <?= $form->field($model, 'produs_stock')->textInput([
        'type' => 'number'
    ]) ?>

    <?=
        $form->field($model, 'produs_created_date')->widget(\kartik\date\DatePicker::className(), [
            'value' => date('yyyy-mm-dd', strtotime('+1 days')),
            'type' => 1,
            'options' => [
                    'placeholder' => false,
            ],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
            ]
        ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success mt-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>