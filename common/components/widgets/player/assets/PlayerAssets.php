<?php
/**
 * Ресурсы плеера
 */
namespace common\components\widgets\player\assets;

use yii\web\AssetBundle;

class PlayerAssets extends AssetBundle
{
    public $sourcePath = '@common/components/widgets/player/assets';
    public $css = [
        'css/demo.css',
        'css/skins/premium-pixels/premium-pixels.css'
    ];
    public $js = [
        'js/demo.js',
        'js/jquery.jplayer.min.js',
        'js/jplayer.playlist.min.js'
    ];
    public $depends = [
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
?>