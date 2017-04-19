<?php
/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/3/1
 * Time: 23:58
 */
namespace app\assets;
use yii\web\AssetBundle;
class JqueryDataTables extends AssetBundle
{
    public $sourcePath = '@bower';
    public $js = [
        'datatables/media/js/jquery.dataTables.min.js',
    ];
    public $css =[
        'datatables/media/css/jquery.dataTables.min.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}