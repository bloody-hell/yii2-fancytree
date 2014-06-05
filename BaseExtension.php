<?php


namespace bloody_hell\yii2_fancytree;


use yii\base\Object;
use yii\helpers\ArrayHelper;

abstract class BaseExtension extends Object  implements IExtension
{
    /**
     * @var array
     */
    public $options = [];

    /**
     * @return string[]
     */
    public function getAssetBundles()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return ArrayHelper::merge($this->getDefaultOptions(), $this->options);
    }
} 