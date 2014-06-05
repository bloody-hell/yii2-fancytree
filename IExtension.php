<?php


namespace bloody_hell\yii2_fancytree;


interface IExtension
{
    /**
     * @return string[]
     */
    public function getAssetBundles();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function getOptions();
} 