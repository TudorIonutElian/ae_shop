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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
    <?php Pjax::end(); ?>


</div>
