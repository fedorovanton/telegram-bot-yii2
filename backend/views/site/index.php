<?php

use \yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Пульт управления ботом';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>МП HELP</h1>
        <p class="lead">Пульт управления Влада Козаченко.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Команды</h2>

                <p>Возможность создать команды для бота с подкомандами и ответами.</p>

                <p><?= Html::a('Перейти', ['command/index'], ['class' => 'btn btn-default'])?></p>
            </div>
            <div class="col-lg-4">
                <h2>Пользователи</h2>

                <p>Управление пользователями и доступом к боту.</p>

                <p><?= Html::a('Перейти', ['user/index'], ['class' => 'btn btn-default'])?></p>
            </div>

            <div class="col-lg-4">
                <h2>История команд пользователей</h2>

                <p>Просмотр истории выполняемых команд пользователями к боту.</p>

                <p><?= Html::a('Перейти', ['user-command-history/index'], ['class' => 'btn btn-default'])?></p>
            </div>

            <div class="col-lg-4">
                <h2>Логи</h2>

                <p>Просмотр истории запросов между пользователями и ботом.</p>

                <p><?= Html::a('Перейти', ['log/index'], ['class' => 'btn btn-default'])?></p>
            </div>

        </div>

    </div>
</div>
