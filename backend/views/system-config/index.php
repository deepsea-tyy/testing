<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-config-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create System Config', ['create'], ['class' => 'btn btn-success ajaxify']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'content:ntext',
            'introduction',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
