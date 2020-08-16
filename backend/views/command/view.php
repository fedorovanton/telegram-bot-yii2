<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \backend\models\Command\Command;

/* @var $this yii\web\View */
/* @var $model backend\models\Command\Command */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Команды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="command-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить команду?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                },
            ],
            'name',
            'answer:ntext',
            'comment',
            'counter',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
