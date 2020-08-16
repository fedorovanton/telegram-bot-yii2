<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model backend\models\Log\Log */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="log-view">

    <h3>ID: <?= $model->id ?></h3>
    <h3>Дата создания: <?= Yii::$app->formatter->asDatetime($model->created_at, 'php:H:i:s d.m.Y') ?></h3>

    <p>Лог:
        <p><?php VarDumper::dump(json_decode($model->content,true),10,true) ?></p></p>


</div>
