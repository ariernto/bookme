<div class="form-group">
    <i class="field-icon icofont-wall-clock"></i>
    <div class="form-content">
        <div class="form-date-search">
            <div class="date-picker ">
                <label>{{ $field['title'] ?? "" }}</label>
                <div class="render ">{{Request::query('start',display_date(strtotime("today")))}}</div>
            </div>
            <input type="hidden" class="check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}" name="start">
            <input type="text" class="check-in-out" name="date" value="{{Request::query('date',date("Y-m-d"))}}">
        </div>
    </div>
</div>