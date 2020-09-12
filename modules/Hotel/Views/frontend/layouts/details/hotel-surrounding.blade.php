@if(!empty($location_category) and !empty($translation->surrounding))
	<div class="g-surrounding">
		<div class="location-title">
			<h3 class="mb-4">{{__("What's Nearby")}}</h3>
			@foreach($location_category as $category)
				<h6 class="font-weight-bold mb-3"><i class="{{clean($category->icon_class)}} "></i> {{$category->translations->name??$category->name}}</h6>
				@if(!empty($translation->surrounding[$category->id]))
					@foreach($translation->surrounding[$category->id] as $item)
						<div class="row mb-3">
							<div class="col-lg-4">{{$item['name']}} ({{$item['value']}}{{$item['type']}})</div>
							<div class="col-lg-8">{{$item['content']}}</div>
						</div>
					@endforeach
				@endif
			@endforeach
		</div>
	</div>
@endif
