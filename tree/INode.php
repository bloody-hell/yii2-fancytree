<?php


namespace bloody_hell\yii2_fancytree\tree;


interface INode extends \JsonSerializable
{
    /**
     * @return string|null
     */
    public function getKey();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return bool
     */
    public function getIsExpanded();

    /**
     * @return bool
     */
    public function getIsActive();

    /**
     * @return bool
     */
    public function getIsFocused();

    /**
     * @return bool
     */
    public function getIsFolder();

    /**
     * @return bool
     */
    public function getHideCheckbox();

    /**
     * @return bool
     */
    public function getIsLazy();

    /**
     * @return bool
     */
    public function getIsSelected();

    /**
     * @return bool
     */
    public function getIsUnSelectable();

    /**
     * @return INode[]|null
     */
    public function getChildren();

    /**
     * @return string|null
     */
    public function getTooltip();

    /**
     * @return string[]
     */
    public function getExtraClasses();

    /**
     * @return INode
     */
    public function getParent();

    /**
     * @param INode $node
     *
     * @return $this
     */
    public function setParent(INode $node);

    /**
     * @return array
     */
    public function getData();
} 