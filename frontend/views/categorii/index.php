<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorii';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if(Yii::$app->user->can('creaza-categorii')) : ?>
            <p>
                <?= Html::a('Create Categorii', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php endif; ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'categorie_denumire',
            'categorie_is_active',
            [   'class' => 'yii\grid\ActionColumn',
                'visible' =>  Yii::$app->user->can('creaza-categorii')
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>


</div>
