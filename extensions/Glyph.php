<?php


namespace bloody_hell\yii2_fancytree\extensions;


use bloody_hell\yii2_fancytree\BaseExtension;

class Glyph extends BaseExtension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'glyph';
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'map' => [
                'doc'              => 'glyphicon glyphicon-file',
                'docOpen'          => 'glyphicon glyphicon-file',
                'checkbox'         => 'glyphicon glyphicon-unchecked',
                'checkboxSelected' => 'glyphicon glyphicon-check',
                'checkboxUnknown'  => 'glyphicon glyphicon-share',
                'error'            => 'glyphicon glyphicon-warning-sign',
                'expanderClosed'   => 'glyphicon glyphicon-plus-sign',
                'expanderLazy'     => 'glyphicon glyphicon-plus-sign',
                // 'expanderLazy' => 'glyphicon glyphicon-expand',
                'expanderOpen'     => 'glyphicon glyphicon-minus-sign',
                // 'expanderOpen' => 'glyphicon glyphicon-collapse-down',
                'folder'           => 'glyphicon glyphicon-folder-close',
                'folderOpen'       => 'glyphicon glyphicon-folder-open',
                'loading'          => 'glyphicon glyphicon-refresh'
                // 'loading' => 'icon-spinner icon-spin'
            ],
        ];
    }
} 