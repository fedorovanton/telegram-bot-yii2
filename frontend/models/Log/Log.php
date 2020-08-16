<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 26/02/2019
 * Time: 16:17
 */

namespace frontend\models\Log;

use \common\models\Log as BaseLog;

class Log extends BaseLog
{
    public function serviceAdd($content)
    {
        $this->content = $content;
    }
}