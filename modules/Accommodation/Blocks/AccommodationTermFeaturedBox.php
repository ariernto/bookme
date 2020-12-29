<?php
namespace Modules\Accommodation\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Core\Models\Terms;

class AccommodationTermFeaturedBox extends BaseBlock
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
                    'id'        => 'desc',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Desc')
                ],
                [
                    'id'           => 'term_accommodation',
                    'type'         => 'select2',
                    'label'        => __('Select term accommodation'),
                    'select2'      => [
                        'ajax'     => [
                            'url'      => route('accommodation.admin.attribute.term.getForSelect2', ['type' => 'accommodation']),
                            'dataType' => 'json'
                        ],
                        'width'    => '100%',
                        'multiple' => "true",
                    ],
                    'pre_selected' => route('accommodation.admin.attribute.term.getForSelect2', [
                        'type'         => 'accommodation',
                        'pre_selected' => 1
                    ])
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('Accommodation: Term Featured Box');
    }

    public function content($model = [])
    {
        if (empty($term_accommodation = $model['term_accommodation'])) {
            return "";
        }
        $list_term = Terms::whereIn('id',$term_accommodation)->get();
        $model['list_term'] = $list_term;
        return view('Accommodation::frontend.blocks.term-featured-box.index', $model);
    }

    public function contentAPI($model = []){
        $model['list_term'] = null;
        if (!empty($term_accommodation = $model['term_accommodation'])) {
            $list_term = Terms::whereIn('id',$term_accommodation)->get();
            if(!empty($list_term)){
                foreach ( $list_term as $item){
                    $model['list_term'][] = [
                        "id"=>$item->id,
                        "attr_id"=>$item->attr_id,
                        "name"=>$item->name,
                        "image_id"=>$item->image_id,
                        "image_url"=>get_file_url($item->image_id,"full"),
                        "icon"=>$item->icon,
                    ];
                }
            }
        }
        return $model;
    }
}