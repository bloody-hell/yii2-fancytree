<?php


namespace bloody_hell\yii2_fancytree\skins;


use bloody_hell\yii2_fancytree\Asset;
use bloody_hell\yii2_fancytree\CoreAsset;
use Yii;

class BootstrapAsset extends Asset
{
    public $css = [
        'skin-bootstrap/ui.fancytree.min.css',
    ];

    public function init()
    {
        parent::init();

        $this->depends[] = CoreAsset::className();
    }

} 