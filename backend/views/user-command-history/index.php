<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserCommandHistory\UserCommandHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Истоия команд пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-command-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'user_id' => [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return Html::a($model->user->username, ['user/view', 'id' => $model->user_id]);
                },
                'format' => 'raw',
            ],
            'command_id' => [
                'attribute' => 'command_id',
                'value' => function ($model) {
                    return Html::a($model->command->name . ' (' . $model->command->comment . ')', ['command/view', 'id' => $model->command_id]);
                },
                'format' => 'raw',
            ],
            'created_at' => [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->created_at, 'php:H:i:s d.m.Y');
                }
            ],
//            'updated_at',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
