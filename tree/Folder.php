<?php


namespace bloody_hell\yii2_fancytree\tree;


class Folder extends BaseFolder
{
    /**
     * @var INode[]
     */
    private $_children;

    /**
     * @return bool
     */
    public function getIsLazy()
    {
        return false;
    }

    /**
     * @return INode[]
     */
    public function getChildren()
    {
        return $this->_children;
    }

    /**
     * @param INode $node
     *
     * @return $this
     */
    public function addChild(INode $node)
    {
        $this->_children[] = $node;
        return $this;
    }

    /**
     * @param INode[] $children
     * @return $this
     */
    public function setChildren(array $children)
    {
        $this->_children = [];
        foreach($children as $child){
            $this->addChild($child);
        }
        return $this;
    }
} 