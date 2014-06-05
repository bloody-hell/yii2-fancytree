<?php


namespace bloody_hell\yii2_fancytree;


abstract class BaseSkin implements ISkin
{
    /**
     * @return string[]
     */
    public function getAssetBundles()
    {
        return [];
    }

    /**
     * @return \bloody_hell\yii2_fancytree\IExtension[]
     */
    public function getExtensions()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getExtraOptions()
    {
        return [];
    }
} 