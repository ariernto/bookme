<?php
namespace Modules\Template\Blocks;
class Text extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'    => 'content',
                    'type'  => 'editor',
                    'label' => __('Editor')
                ],
                [
                    'id'        => 'class',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Wrapper Class (opt)')
                ],
//                [
//                    'id'    => 'bg',
//                    'type'  => 'uploader',
//                    'label' => __('Image Uploader')
//                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('Text');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.text', $model);
    }
}