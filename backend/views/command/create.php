<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Command\Command */

$this->title = 'Добавление команды';
$this->params['breadcrumbs'][] = ['label' => 'Команды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="command-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
