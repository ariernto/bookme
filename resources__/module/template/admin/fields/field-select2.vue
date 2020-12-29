<template>
    <select>
    </select>
</template>
<script>

    import { abstractField } from "vue-form-generator";
import { type } from 'os';

    export default {
        mixins: [ abstractField ],
        data(){
            return {
                options:[],
                selectedText:''
            }
        },
        mounted: function () {
            var vm = this;

            $(vm.$el).select2(vm.schema.select2);

            if(this.schema.pre_selected && this.value){
                $.ajax({
                    method:'get',
                    url:this.schema.pre_selected,
                    data:{
                        selected:this.value
                    },
                    dataType:'json',
                    success:function (json) {
                        if(vm.schema.select2.multiple){
                            if(typeof json.items !='undefined' && typeof json.items == 'object' && json.items.length){
                                for(var i = 0 ; i < json.items.length; i++){
                                    var newOption = new Option(json.items[i].text, json.items[i].id, true, true);
                                    $(vm.$el).append(newOption);
                                }
                                $(vm.$el).select2('val',this.value)
                                $(vm.$el).trigger('change');
                            }
                            return;
                        }else{
                            var newOption = new Option(json.text, vm.value, false, false);
                            $(vm.$el).append(newOption).trigger('change');
                        }
                        //vm.selectedText = json.text;
                        

                    }

                })
            }else{

            }

            $(vm.$el).on('change',function () {
                // vm.$emit('input', $(this).val());
                vm.value = $(this).val();
            })
        },
        watch: {
            // value: function (value) {
            //     // update value
            //     $(this.$el)
            //         .val(value)
            //         .trigger('change')
            // },
            options: function (options) {
                // update options
                //$(this.$el).empty().select2({ data: options })
            }
        },
        destroyed: function () {
            $(this.$el).off().select2('destroy')
        }
    };
</script>
