<div class="panel">
    <div class="panel-title"><strong>{{__('Ical')}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Import url")}}</label>
            <input type="text" value="{{$row->ical_import_url}}"  name="ical_import_url" class="form-control">
        </div>
        @if(!empty($row->id))
        <div class="form-group">
            <label>{{__("Export url")}}</label>
            <input type="text" value="{{route('booking.admin.export-ical',['type'=>'hotel',$row->id])}}"   class="form-control">
        </div>
            @endif
    </div>
</div>
