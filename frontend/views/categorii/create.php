<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorii */

$this->title = 'Create Categorii';
$this->params['breadcrumbs'][] = ['label' => 'Categoriis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
