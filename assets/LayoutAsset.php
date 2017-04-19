<?php
/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/3/2
 * Time: 22:23
 */
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LayoutAsset extends AssetBundle
{

    public $css = [

    ];
    public $js = [

    ];
    public $depends = [
        'app\assets\AppAsset',
//        'app\assets\JqueryAutosize',
//        'app\assets\JqueryDataTables',
    ];
}