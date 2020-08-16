<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \backend\models\Command\Command;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Command\CommandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Команды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="command-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить команду', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'command_parent_id' => [
                'attribute' => 'command_parent_id',
                'value' => function($data) {
                    $command = Command::findOne($data->command_parent_id);
                    if (!empty($command)) {
                        return $command->name;
                    } else {
                        return '';
                    }
                }
            ],
            'name',
            'answer:ntext',
            'comment',
            'counter',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
