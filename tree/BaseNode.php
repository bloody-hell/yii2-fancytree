<?php


namespace bloody_hell\yii2_fancytree\tree;


abstract class BaseNode implements INode
{

    /**
     * @var null|string
     */
    private $_key = null;

    /**
     * @var string
     */
    private $_title;

    /**
     * @var string
     */
    private $_tooltip;

    /**
     * @var bool
     */
    private $_is_focused = false;

    /**
     * @var bool
     */
    private $_hide_checkbox = false;

    /**
     * @var bool
     */
    private $_is_selected = false;

    /**
     * @var bool
     */
    private $_unselectable = false;

    /**
     * @var string[]
     */
    private $_extra_classes = [];

    /**
     * @var INode
     */
    private $_parent;

    /**
     * @param INode $parent
     *
     * @return $this
     */
    public function setParent(INode $parent)
    {
        $this->_parent = $parent;
        return $this;
    }

    /**
     * @return INode
     */
    public function getParent()
    {
        return $this->_parent;
    }

    /**
     * @param boolean $is_active
     */
    public function setIsActive($is_active)
    {
        $this->_is_active = $is_active;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->_is_active;
    }

    /**
     * @var bool
     */
    private $_is_active = false;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return bool
     */
    public function getIsFocused()
    {
        return $this->_is_focused;
    }

    /**
     * @return bool
     */
    public function getHideCheckbox()
    {
        return $this->_hide_checkbox;
    }

    /**
     * @return bool
     */
    public function getIsSelected()
    {
        return $this->_is_selected;
    }

    /**
     * @return bool
     */
    public function getIsUnSelectable()
    {
        return $this->_unselectable;
    }

    /**
     * @return string|null
     */
    public function getTooltip()
    {
        return $this->_tooltip;
    }

    /**
     * @return string[]
     */
    public function getExtraClasses()
    {
        return $this->_extra_classes;
    }


    /**
     * @param \string[] $extra_classes
     * @return $this
     */
    public function setExtraClasses($extra_classes)
    {
        $this->_extra_classes = $extra_classes;
        return $this;
    }

    /**
     * @param boolean $hide_checkbox
     * @return $this
     */
    public function setHideCheckbox($hide_checkbox)
    {
        $this->_hide_checkbox = $hide_checkbox;
        return $this;
    }

    /**
     * @param boolean $is_focused
     * @return $this
     */
    public function setIsFocused($is_focused)
    {
        $this->_is_focused = $is_focused;
        return $this;
    }

    /**
     * @param boolean $is_selected
     * @return $this
     */
    public function setIsSelected($is_selected)
    {
        $this->_is_selected = $is_selected;
        return $this;
    }

    /**
     * @param null|string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * @param string $tooltip
     * @return $this
     */
    public function setTooltip($tooltip)
    {
        $this->_tooltip = $tooltip;
        return $this;
    }

    /**
     * @param boolean $unselectable
     * @return $this
     */
    public function setUnselectable($unselectable)
    {
        $this->_unselectable = $unselectable;
        return $this;
    }


    /**
     * @return string|null
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $json = [
            'title'        => $this->getTitle(),
            'expanded'     => $this->getIsExpanded(),
            'active'       => $this->getIsActive(),
            'focus'        => $this->getIsFocused(),
            'folder'       => $this->getIsFolder(),
            'hideCheckbox' => $this->getHideCheckbox(),
            'lazy'         => $this->getIsLazy(),
            'selected'     => $this->getIsSelected(),
            'unselectable' => $this->getIsUnSelectable(),
            'tooltip'      => $this->getTooltip(),
            'extraClasses' => implode(' ', $this->getExtraClasses()),
        ];

        if($key = $this->getKey()){
            $json['key'] = $key;
        }

        if(null !== $children = $this->getChildren()){
            $json['children'] = $children;
        }

        return $json;
    }

    public function __construct($title)
    {
        $this->setTitle($title);
    }
}