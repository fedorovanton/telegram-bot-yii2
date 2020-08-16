<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCommandHistory\UserCommandHistory */

$this->title = 'Create User Command History';
$this->params['breadcrumbs'][] = ['label' => 'User Command Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-command-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
