<?php
namespace Modules\Boat\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Core\Models\Terms;

class BoatTermFeaturedBox extends BaseBlock
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
                    'id'           => 'term_boat',
                    'type'         => 'select2',
                    'label'        => __('Select term boat'),
                    'select2'      => [
                        'ajax'     => [
                            'url'      => route('boat.admin.attribute.term.getForSelect2', ['type' => 'boat']),
                            'dataType' => 'json'
                        ],
                        'width'    => '100%',
                        'multiple' => "true",
                    ],
                    'pre_selected' => route('boat.admin.attribute.term.getForSelect2', [
                        'type'         => 'boat',
                        'pre_selected' => 1
                    ])
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('Boat: Term Featured Box');
    }

    public function content($model = [])
    {
        if (empty($term_boat = $model['term_boat'])) {
            return "";
        }
        $list_term = Terms::whereIn('id',$term_boat)->get();
        $model['list_term'] = $list_term;
        return view('Boat::frontend.blocks.term-featured-box.index', $model);
    }
    
    public function contentAPI($model = []){
        $model['list_term'] = null;
        if (!empty($term_boat = $model['term_boat'])) {
            $list_term = Terms::whereIn('id',$term_boat)->get();
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