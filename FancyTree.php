<?php

namespace bloody_hell\yii2_fancytree;

use bloody_hell\yii2_fancytree\skins\Bootstrap;
use bloody_hell\yii2_fancytree\tree\INode;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;

class FancyTree extends \yii\base\Widget
{
    /**
     * @var INode[]
     */
    public $source;

    /**
     * @var bool
     */
    public $activeVisible = false;

    /**
     * @var JsExpression
     */
    public $lazyLoad;

    /**
     * @var mixed
     */
    public $sourceUrl;

    public $options = [];

    public $clientOptions = [];

    /**
     * @var IExtension[]
     */
    public $extensions = [];

    /**
     * @var string|ISkin
     */
    public $skin = 'bootstrap';

    public function init()
    {
        parent::init();
        CoreAsset::register($this->view);
        if(isset($this->options['id']) && !$this->getId(false)){
            $this->setId($this->options['id']);
        } else {
            $this->options['id'] = $this->getId();
        }
        if(! $this->skin instanceof ISkin){
            $this->skin = static::generateSkin($this->skin);
        }
        $assets = call_user_func_array('array_merge', array_map(function(IExtension $extension){
                    return $extension->getAssetBundles();
                }, $this->getExtensions()));
        if($this->skin){
            $assets = array_merge($assets, $this->skin->getAssetBundles());
        }
        foreach($assets as $assetBundle){
            $assetBundle::register($this->view);
        }
    }

    public function run()
    {
        parent::run();

        $this->view->registerJs('jQuery(\'#' . $this->getId() . '\').fancytree(' . Json::encode($this->generateOptions()). ');');

        return Html::tag('div', '', $this->options);
    }

    /**
     * @return IExtension[]
     */
    protected function getExtensions()
    {
        $extensions = $this->extensions;
        if($this->skin){
            $extensions = array_merge($this->skin->getExtensions(), $this->extensions);
        }
        return $extensions;
    }

    protected function generateOptions()
    {
        $options = array_merge($this->skin->getExtraOptions(), $this->clientOptions);

        if($this->sourceUrl){
            $options['source'] = Url::toRoute($this->sourceUrl);
        } else {
            $options['source'] = $this->source;
        }

        if($this->lazyLoad){
            $options['lazyLoad'] = $this->lazyLoad;
        }

        $options['extensions'] = [];

        foreach($this->getExtensions() as $extension){
            $options['extensions'][] = $extension->getName();
            $options[$extension->getName()] = $extension->getOptions();
        }

        return $options;
    }

    /**
     * @param $skin
     *
     * @return ISkin
     *
     * @throws \InvalidArgumentException
     */
    private static function generateSkin($skin)
    {
        switch($skin){
            case 'bootstrap':
                $skin = new Bootstrap();
                return $skin;
        }
        throw new \InvalidArgumentException('Unknown skin');
    }
}