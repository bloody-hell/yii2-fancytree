<?php


namespace bloody_hell\yii2_fancytree;


interface ISkin
{
    /**
     * @return string[]
     */
    public function getAssetBundles();

    /**
     * @return IExtension[]
     */
    public function getExtensions();

    /**
     * @return array
     */
    public function getExtraOptions();
} 