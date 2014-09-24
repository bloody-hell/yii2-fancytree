<?php


namespace bloody_hell\yii2_fancytree;


use yii\web\JqueryAsset;

class CoreAsset extends Asset
{
    public $js = [
        'jquery.fancytree-all.js',
    ];

    public $depends = [];

    public function init()
    {
        parent::init();
        $this->depends[] = JqueryAsset::className();
        $this->depends[] = \yii\jui\JuiAsset::className();
    }

} 