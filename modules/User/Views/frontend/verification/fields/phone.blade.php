<div class="form-group">
	<div class="row ">
		<?php
		$fieldName = $field['name_' . app()->getLocale()] ?? $field['name'] ?? $field['id'];
		;?>
		<label class="col-md-3 text-right col-form-label">{{$fieldName}}
			@if(!empty($field['required']))
				<span class="text-danger">*</span>
			@endif
			:
		</label>
		<div class="col-md-{{$value_col_size ?? 4}}">
			@if(empty($only_show_data))
				<input type="text" class="form-control mb-1" id="phone_verify_field" name="verify_data_{{$field['id']}}" value="{{$field['data']}}">
				@if(empty($field['is_verified']))
					<span class="btn btn-sm btn-primary" onclick="sendCodeVerifyPhone('verify_data_{{$field["id"]}}','{{$fieldName}}')">{{__('Verify Phone')}}</span>
				@else
					<a class="badge badge-success" href="#" onclick="return false"><i>{{__("Verified")}}</i></a>
				
				@endif
			@else
				<div class=""><strong>{{$field['data'] ? $field['data'] : __('N/A')}}</strong></div>
				@if(!empty($field['is_verified']))
					<a class="badge badge-success" href="#" onclick="return false"><i>{{__("Verified")}}</i></a>
				@else
					<span class="badge badge-secondary"><i>{{__("Not Verified")}}</i></span>
				@endif
			@endif
		</div>
	</div>
</div>
