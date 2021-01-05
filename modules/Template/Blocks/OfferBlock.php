<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Location\Models\Location;
use Modules\Media\Helpers\FileHelper;

class OfferBlock extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
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
                            'label'     => __('Title')
                        ],
                        [
                            'id'        => 'desc',
                            'type'      => 'textArea',
                            'inputType' => 'textArea',
                            'label'     => __('Desc')
                        ],
                        [
                            'id'    => 'background_image',
                            'type'  => 'uploader',
                            'label' => __('Background Image Uploader')
                        ],
                        [
                            'id'        => 'link_title',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Title Link More')
                        ],
                        [
                            'id'        => 'link_more',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Link More')
                        ],
                        [
                            'id'        => 'featured_text',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Featured text')
                        ],
                        [
                            'id'        => 'featured_icon',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Featured icon (find icon class in : https://icofont.com/icons)')
                        ],
                    ]
                ],

            ]
        ]);
    }

    public function getName()
    {
        return __('Offer Block');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.offer-block.index', $model);
    }

    public function contentAPI($model = []){
        if(!empty($model['list_item'])){
            foreach (  $model['list_item'] as &$item ){
                $item['background_image_url'] = FileHelper::url($item['background_image'], 'full');
            }
        }
        return $model;
    }
}