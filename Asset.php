<?php

namespace bloody_hell\yii2_fancytree;

use Yii;
use yii\jui\CoreAsset;
use yii\web\JqueryAsset;

class Asset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/mar10/fancytree/dist';

    public $css = [
        'skin-bootstrap/ui.fancytree.min.css',
    ];

    public $js = [
        'jquery.fancytree-all.js',
    ];

    public $depends = [];

    public function init()
    {
        parent::init();
        $this->depends[] = JqueryAsset::className();
        $this->depends[] = CoreAsset::className();
    }

} 