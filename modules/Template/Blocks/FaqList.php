<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

class FaqList extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'        => 'title',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Question')
                        ],
                        [
                            'id'        => 'sub_title',
                            'type'      => 'editor',
                            'inputType' => 'textArea',
                            'label'     => __('Answer')
                        ],
                    ]
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('FAQ List');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.faq-list', $model);
    }
}