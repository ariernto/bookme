@if(is_default_lang())
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Price")}} <span class="text-danger">*</span></label>
                <input type="number" required value="{{$row->price}}" min="1" placeholder="{{__("Price")}}" name="price" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Number of room")}} <span class="text-danger">*</span></label>
                <input type="number" required value="{{$row->number ?? 1}}" min="1" max="100" placeholder="{{__("Number")}}" name="number" class="form-control">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Number of beds")}} </label>
                <input type="number"  value="{{$row->beds ?? 1}}" min="1" max="10" placeholder="{{__("Number")}}" name="beds" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Room Size")}} </label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="size" value="{{$row->size ?? 0}}" placeholder="{{__("Room size")}}" >
                    <div class="input-group-append">
                        <span class="input-group-text" >{!! size_unit_format() !!}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Max Adults")}} </label>
                <input type="number" min="1"  value="{{$row->adults ?? 1}}"  name="adults" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Max Children")}} </label>
                <input type="number" min="0"  value="{{$row->children ?? 0}}"  name="children" class="form-control">
            </div>
        </div>
    </div>
    <hr>
@endif