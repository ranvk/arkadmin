<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BaseAsset extends AssetBundle
{
    public $sourcePath = '@vendor';
    public $css = [
        'fortawesome/font-awesome/css/font-awesome.css',
        'bower/jquery.uniform/dist/css/default.css',
    ];
    public $js = [
        'bower/vue/dist/vue.js',
        'bower/axios/dist/axios.js',
        'bower/bootstrap/dist/js/bootstrap.min.js',
        'bower/jquery-ui/jquery-ui.min.js',
        'bower/jquery.uniform/dist/js/jquery.uniform.standalone.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
