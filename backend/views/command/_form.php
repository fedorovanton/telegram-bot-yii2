<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\models\Command\Command;

/* @var $this yii\web\View */
/* @var $model backend\models\Command\Command */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="command-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'command_parent_id')->dropDownList(Command::getCommandArray(), ['prompt' => 'Главная команда']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Например, Прислать справочный материал'])->hint('Если создаете главную команду, то обязательно ее добавить в @BotFather -> /setcommands -> Формат: НазваниеКоманды - Что она делает') ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6, 'placeholder' => 'Любой текст. Например, *Команда* работает.'])->hint('
        Поддерживается форматирование текста:<br/>
        *bold text* <br/>
        _italic text_<br/>
        [inline URL](http://www.example.com/)<br/>
        [inline mention of a user](tg://user?id=123456789)<br/>
        `inline fixed-width code`<br/>
        ```block_language<br/>
        pre-formatted fixed-width code block<br/>
        ``` <br/>
    ') ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'placeholder' => 'Пометки по команде для себя']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
