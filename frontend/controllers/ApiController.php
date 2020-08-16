<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 26/02/2019
 * Time: 00:23
 */

namespace frontend\controllers;


use frontend\components\BotService;
use frontend\models\Log\Log;
use yii\rest\Controller;

/**
 * Контроллер для обработки API телеграм
 *
 * Class ApiController
 * @package frontend\controllers
 */
class ApiController extends Controller
{
    public function actionHook()
    {
        $content = file_get_contents("php://input");

        // Логируем
        $log = new Log();
        $log->content = $content;
        $log->save();

        $array_data = json_decode($content, true);
        /*$array_data = ['message' => ['from' => ['id' => 333222],'chat' => ['id' => 1234, 'text' => '/acd_da',]];*/
        $bot = new BotService($array_data);
        $bot->run();
    }
}