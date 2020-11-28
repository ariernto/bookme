<div class="form-group">
    <label>{{__("Name")}}</label>
    <input type="text" value="{{$translation->name}}" placeholder="{{__("Attribute name")}}" name="name" class="form-control">
</div>
@if(is_default_lang())
    <div class="form-group">
        <label>{{__("Display Type in detail service")}}</label>
        <select name="display_type" class="form-control">
            <option  @if($row->display_type == "icon_left") selected @endif value="icon_left">{{__("Display Left Icon")}}</option>
            <option  @if($row->display_type == "icon_center") selected @endif value="icon_center">{{__("Display Center Icon")}}</option>
        </select>
    </div>
    <div class="form-grou">
        <label>{{__('Hide in detail service')}}</label>
        <br>
        <label>
            <input type="checkbox" name="hide_in_single" @if($row->hide_in_single) checked @endif value="1"> {{__("Enable hide")}}
        </label>
    </div>
@endif