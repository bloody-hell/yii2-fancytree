<?php


namespace bloody_hell\yii2_fancytree;


interface ISkin
{
    /**
     * @return string[]
     */
    public function getAssetBundles();

    /**
     * @return array
     */
    public function getExtensions();

    /**
     * @return array
     */
    public function getExtraOptions();
} 