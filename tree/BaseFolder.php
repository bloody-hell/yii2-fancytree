<?php


namespace bloody_hell\yii2_fancytree\tree;


abstract class BaseFolder extends BaseNode
{
    /**
     * @return bool
     */
    public function getIsFolder()
    {
        return true;
    }

    private $_is_expanded;

    /**
     * @return bool
     */
    public function getIsExpanded()
    {
        return $this->_is_expanded;
    }

    /**
     * @param mixed $is_expanded
     * @return $this
     */
    public function setIsExpanded($is_expanded)
    {
        $this->_is_expanded = $is_expanded;
        return $this;
    }

} 