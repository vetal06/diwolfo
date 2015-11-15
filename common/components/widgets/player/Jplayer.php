<?php
/**
 * Музыкальный плеер.
 */
namespace common\components\widgets\player;

use common\components\widgets\player\assets\PlayerAssets;
use yii\base\Widget;

class Jplayer extends Widget{

    public function run(){
       return $this->render('index');
    }
}