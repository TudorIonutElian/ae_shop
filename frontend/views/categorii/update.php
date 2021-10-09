<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorii */

$this->title = 'Update Categorii: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categoriis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categorii-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
