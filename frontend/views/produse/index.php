<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProduseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produse';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produse-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adauga Produs', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vezi Produse', ['all'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'produs_categorie',
                'value' => 'categorie.categorie_denumire'
            ],
            'produs_denumire',
            'produs_imagine',
            //'produs_categorie',
            'produs_pret',
            'produs_is_active',
            'produs_stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
