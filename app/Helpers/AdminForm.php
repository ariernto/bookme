<?php
namespace App\Helpers;

class AdminForm{

    public static function select($name,$options,$old = '',$class='',$forListItem = false){
        ?>
        <select class="form-control <?php echo e($class) ?>" <?php if($forListItem) echo '__name__'; else echo 'name'; ?>="<?php echo e($name) ?>">
            <?php 
            if(!empty($options)):
            foreach($options as $option): $selected = ''; if($old == $option['id']) $selected = 'selected' ?>
            <option value="<?php echo e($option['id']) ?>" <?php echo e($selected) ?>><?php echo e($option['name']) ?></option>
            <?php endforeach;endif; ?>
        </select>
        <?php
    }

    public static function select2($name,$options,$old = []){
        ?>
        <select class="form-control dungdt-select2-field" data-options='<?php echo json_encode($options['configs']) ?>' name="<?php echo e($name) ?>">
            <?php if(!empty($old[1])):?>
                <option value="<?php echo e($old[0]) ?>" selected><?php echo e($old[1]) ?></option>
            <?php endif;?>
        </select>
        <?php
    }

    public static function generate($options){
        if(!empty($options))
        {
            $languages = \Modules\Language\Models\Language::getActive();

            foreach ($options as $option)
            {
                switch ($option['type'])
                {
                    case "checkbox":
                        ?>
                        <div class="form-group" <?php if(!empty($option['condition'])) echo 'data-condition="'.e($option['condition']).'"'; ?> >
                            <label class="" >
                                <input type="checkbox" class="form-control" name="<?php echo  e($option['id']) ?>" value="1" <?php if($option['value'] == 1) echo 'checked'; ?>>
                                <?php echo e($option['label']) ?></label>
                        </div>
                        <?php
                        break;
                    case "input":
                        ?>
                        <div class="form-group" <?php if(!empty($option['condition'])) echo 'data-condition="'.e($option['condition']).'"'; ?> >
                            <label class="" ><?php echo e($option['label']) ?></label>
                            <div class="form-controls">
                                <?php if(!empty($option['multi_lang']) && !empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')) {?>
                                    <div class="form-group-multi-lang">
                                        <?php foreach($languages as $language){ ?>
                                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                            <div class="g-lang">
                                                <div class="title-lang"> <?php echo $language->name ?> </div>
                                                <input type="<?php e($option['input_type'] ?? 'text') ?>" class="form-control" name="<?php echo e($option['id'].$key_lang ) ?>" value="<?php echo e($option['value'.$key_lang] ?? '') ?>">
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php }else{ ?>
                                    <input type="<?php e($option['input_type'] ?? 'text') ?>" class="form-control" name="<?php echo e($option['id']) ?>" value="<?php echo e($option['value'] ?? '') ?>">
                                <?php } ?>
                            </div>
                            <?php if(!empty($option['desc'])){
                                printf('<small class="form-text text-muted">%s</small>',$option['desc']);
                            } ?>
                        </div>
                        <?php
                        break;
                    case "select":
                        ?>
                        <div class="form-group" <?php if(!empty($option['condition'])) echo 'data-condition="'.e($option['condition']).'"'; ?> >
                            <label class="" ><?php echo e($option['label']) ?></label>
                            <div class="form-controls">
                                <select name="<?php echo e($option['id']) ?>" class="form-control">
                                    <option value=""><?php echo __('-- Select --') ?></option>
                                    <?php if(!empty($option['options'])){
                                        foreach ($option['options'] as $val=>$label)
                                        {
                                            ?>
                                            <option <?php if($option['value'] == $val) echo 'selected'; ?> value="<?php echo e($val) ?>"><?php echo e($label) ?></option>
                                            <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <?php if(!empty($option['desc'])){
                                printf('<small class="form-text text-muted">%s</small>',$option['desc']);
                            } ?>
                        </div>
                        <?php
                        break;

                    case "editor":
                        ?>
                        <div class="form-group" <?php if(!empty($option['condition'])) echo 'data-condition="'.e($option['condition']).'"'; ?>  >
                            <label class="" ><?php echo e($option['label']) ?></label>
                            <div class="form-controls">
                                <?php if(!empty($option['multi_lang']) && !empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')) {?>
                                    <div class="form-group-multi-lang">
                                        <?php foreach($languages as $language){ ?>
                                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                            <div class="g-lang">
                                                <div class="title-lang"> <?php echo $language->name ?> </div>
                                                <textarea name="<?php echo e($option['id'].$key_lang ) ?>" class="has-ckeditor"  cols="30" rows="7"><?php echo clean($option['value'.$key_lang]) ?></textarea>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php }else{ ?>
                                    <textarea name="<?php echo e($option['id']) ?>" class="has-ckeditor"  cols="30" rows="7"><?php echo clean($option['value']) ?></textarea>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case "upload":
                        ?>
                        <div class="form-group" <?php if(!empty($option['condition'])) echo 'data-condition="'.e($option['condition']).'"'; ?>  >
                            <label class="" ><?php echo e($option['label']) ?></label>
                            <div class="form-controls">
                                <?php
                                echo \Modules\Media\Helpers\FileHelper::fieldUpload($option['id'],$option['value'] ?? '');
                                ?>
                            </div>
                        </div>
                        <?php

                        break;

                }
            }
        }
    }
}