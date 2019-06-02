<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'css/material-kit.css',
        //'css/bootstrap.css',
        //'css/bootstrap-grid.css',
        //'css/bootstrap-reboot.css',
		'css/font-awesome.min.css',
    ];
    public $js = [
        'js/material-kit.js',
        'js/popper.min.js',
        //'js/bootstrap.js',
        //'js/bootstrap.bundle.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
        //'yii\bootstrap4\BootstrapPluginAsset',
        //'yii\bootstrap4\LinkPager',
		//'rmrevin\yii\fontawesome\AssetBundle',
		//'rmrevin\yii\fontawesome\CdnProAssetBundle',
    ];
}
