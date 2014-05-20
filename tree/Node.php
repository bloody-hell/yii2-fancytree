<?php


namespace bloody_hell\yii2_fancytree\tree;


class Node extends BaseNode
{
    /**
     * @return bool
     */
    public function getIsExpanded()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function getIsFolder()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function getIsLazy()
    {
        return false;
    }

    /**
     * @return INode
     */
    public function getChildren()
    {
        return null;
    }

} 