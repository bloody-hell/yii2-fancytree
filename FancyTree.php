<?php

namespace bloody_hell\yii2_fancytree;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

class FancyTree extends \yii\base\Widget
{
    /**
     * @var array
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

    public function init()
    {
        parent::init();
        Asset::register($this->view);
        if(isset($this->options['id']) && !$this->getId(false)){
            $this->setId($this->options['id']);
        } else {
            $this->options['id'] = $this->getId();
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
        $options = $this->clientOptions;

        if($this->sourceUrl){
            $options['source'] = Url::toRoute($this->sourceUrl);
        } else {
            $options['source'] = $this->source;
        }

        if($this->lazyLoad){
            $options['lazyLoad'] = $this->lazyLoad;
        }

        return $options;
    }
} 