<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produse */

$this->title = $model->produs_denumire;
$this->params['breadcrumbs'][] = ['label' => 'Produse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizeaza', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sterge', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sunteti sigur ca doriti sa stergeti acest produs?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'produs_denumire',
                    [
                            'attribute' => 'produs_imagine',
                            'format' => 'html',
                            'value' => function($model){
                                return  Html::a('Vezi imaginea', 'images/'.$model->produs_imagine) ;
                            }
                    ],
                    [
                            'attribute' => 'produs_categorie',
                            'value' => function($model){
                                $categorie = \app\models\Categorii::findOne($model->produs_categorie)->categorie_denumire;
                                return $categorie;
                            }
                    ],
                    'produs_pret',
                    'produs_is_active',
                    'produs_stock',
                    'produs_created_date'
                ],
            ]) ?>
        </div>
    </div>

</div>
