<?php


namespace bloody_hell\yii2_fancytree\tree;


class LazyNode extends BaseFolder
{
    /**
     * @return bool
     */
    public function getIsLazy()
    {
        return true;
    }

    /**
     * @return INode[]|null
     */
    public function getChildren()
    {
        return null;
    }

} 