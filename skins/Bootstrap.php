<?php


namespace bloody_hell\yii2_fancytree\skins;


use bloody_hell\yii2_fancytree\BaseSkin;
use bloody_hell\yii2_fancytree\extensions\Glyph;

class Bootstrap extends BaseSkin
{
    /**
     * @return string[]
     */
    public function getAssetBundles()
    {
        return [BootstrapAsset::className(),];
    }

    /**
     * @return \bloody_hell\yii2_fancytree\IExtension[]
     */
    public function getExtensions()
    {
        return [new Glyph()];
    }

} 