<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProduseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produse';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produse-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Adauga Produs', ['value' => URL::to('index.php?r=produse/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
        <?= Html::a('Vezi Produse', ['all'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    Modal::begin([
        //'header' => '<h4>Produse</h4>',
        'id'    => 'modal',
        'size'  => 'modal-md',
    ]);
    echo '<div id="modalContent"></div>';

    Modal::end();
    ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->produs_stock == 0){
                return ['class' => 'bg-danger text-white'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'produs_categorie',
                'value' => 'categorie.categorie_denumire'
            ],
            'produs_denumire',
            [
                'attribute' => 'produs_imagine',
                'format' => 'html',
                'value' => function($model){
                    return  Html::a($model->produs_imagine, 'images/'.$model->produs_imagine, ['target' => '_blank']) ;
                }
            ],
            'produs_pret',
            'produs_is_active',
            'produs_stock',

            ['class' => 'yii\grid\ActionColumn'],
            [
                    'class' => 'yii\grid\DataColumn',
                    'label' => 'OutOfStock',
                    'format'=> 'raw',
                    'value' => function($data){
                        return Html::a('Stock 0', 'index.php?r=produse/outofstock&id='.$data->id.'', ['class' => 'btn btn-warning']);
                    }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>


</div>
