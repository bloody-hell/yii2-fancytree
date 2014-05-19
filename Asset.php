<?php

namespace bloody_hell\yii2_fancytree;

class Asset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/mar10/fancytree/dist';

    public $css = [
        'skin-bootstrap/ui.fancytree.min.css',
    ];

    public $js = [
        'jquery.fancytree-all.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
} 