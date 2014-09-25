<?php


namespace bloody_hell\yii2_fancytree\extensions;


use bloody_hell\yii2_fancytree\BaseExtension;
use yii\jui\DraggableAsset;
use yii\jui\DroppableAsset;
use yii\web\JsExpression;

class DragAndDrop extends BaseExtension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'dnd';
    }

    protected function getDefaultOptions()
    {
        return [
            'autoExpandMS' => 1000, // Expand nodes after n milliseconds of hovering.
            'draggable' => null,    // Additional options passed to jQuery draggable
            'droppable' => null,    // Additional options passed to jQuery droppable
            'preventRecursiveMoves' => true, // Prevent dropping nodes on own descendants
            'preventVoidMoves' => true,      // Prevent dropping nodes 'before self', etc.
            // Events that make tree nodes draggable
            'dragStart' => new JsExpression('function(node, data){
                return true;
            }'),    // Callback(sourceNode, data), return true, to enable dnd
            'dragStop' => null,     // Callback(sourceNode, data)
            // Events that make tree nodes accept draggables
            'dragEnter' => new JsExpression('function(node, data){
                return true;
            }'),    // Callback(targetNode, data)
            'dragOver' => null,     // Callback(targetNode, data)
            'dragDrop' => new JsExpression('function(node, data){
                data.otherNode.moveTo(node, data.hitMode);
            }'),     // Callback(targetNode, data)
            'dragLeave' => null     // Callback(targetNode, data)
        ];
    }

    public function getAssetBundles()
    {
        return [];
    }


} 