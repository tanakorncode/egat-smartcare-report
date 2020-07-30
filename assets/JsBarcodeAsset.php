<?php
namespace app\assets;

use yii\web\AssetBundle;

class JsBarcodeAsset extends AssetBundle {

    public $sourcePath = '@bower/jsbarcode/dist';

    public $js = [
        'JsBarcode.all.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}