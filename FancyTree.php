<?php

namespace bloody_hell\yii2_fancytree;

use bloody_hell\yii2_fancytree\skins\Bootstrap;
use bloody_hell\yii2_fancytree\tree\INode;
use yii\helpers\Html;
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
        foreach($this->skin->getAssetBundles() as $skin){
            $skin::register($this->view);
        }
    }

    public function run()
    {
        parent::run();

        $this->view->registerJs('jQuery(\'#' . $this->getId() . '\').fancytree(' . json_encode($this->generateOptions()). ');');

        return Html::tag('div', '', $this->options);
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

        foreach(array_merge($this->skin->getExtensions(), $this->extensions) as $extension => $params){
            $options['extensions'][] = $extension;
            $options[$extension] = $params;
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