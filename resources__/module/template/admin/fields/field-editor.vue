<template>
    <div class="">
        <tinymce-editor v-model="value" :init="init" toolbar="formatselect | bold italic strikethrough forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent code "></tinymce-editor>
    </div>
</template>

<script>
	import { abstractField } from "vue-form-generator";
	import Editor from '@tinymce/tinymce-vue';

	export default {
		mixins: [ abstractField ],
		data(){
			return {
				id:'',
				init:{
					plugins: 'searchreplace autolink fullscreen image link media codesample table charmap hr toc advlist lists wordcount textpattern help code',
                    toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | pagebreak codesample code | removeformat',
					image_advtab: false,
					image_caption: false,
					height:400,
					file_picker_callback: function (callback, value, meta) {
						/* Provide file and text for the link dialog */
						if (meta.filetype === 'file') {
							uploaderModal.show({
								multiple:false,
								file_type:'video',
								onSelect:function (files) {
									if(files.length)
										callback(bookingCore.url+'/media/preview/'+files[0].id);
								},
							});
						}

						/* Provide image and alt text for the image dialog */
						if (meta.filetype === 'image') {
							uploaderModal.show({
								multiple:false,
								file_type:'image',
								onSelect:function (files) {
									if(files.length)
										callback(files[0].thumb_size);
								},
							});
						}

						/* Provide alternative source and posted for the media dialog */
						if (meta.filetype === 'media') {
							uploaderModal.show({
								multiple:false,
								file_type:'video',
								onSelect:function (files) {
									if(files.length)
										callback(bookingCore.url+'/media/preview/'+files[0].id);
								},
							});
						}
					},
				}
			}
		},
		components:{
			'tinymce-editor': Editor
		},
		methods:{
			makeid:function(length) {
				var result           = '';
				var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				var charactersLength = characters.length;
				for ( var i = 0; i < length; i++ ) {
					result += characters.charAt(Math.floor(Math.random() * charactersLength));
				}
				return result;
			}

		},
		created:function () {
		}
	};
</script>