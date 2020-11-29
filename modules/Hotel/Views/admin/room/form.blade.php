@include('Hotel::admin.room.form-detail.content')
@include('Hotel::admin.room.form-detail.pricing')
@include('Hotel::admin.room.form-detail.attributes')
@include('Hotel::admin.room.form-detail.ical')
@if(is_default_lang())
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label ><strong>{{__('Status')}}</strong> </label>
                <select name="status"  class="custom-select">
                    <option value="publish" >{{__('Publish')}}</option>
                    <option value="pending"  @if($row->status == 'pending') selected @endif >{{__('Pending')}}</option>
                    <option value="draft"  @if($row->status == 'draft') selected @endif >{{__('Draft')}}</option>
                </select>
            </div>
        </div>
    </div>
@endif