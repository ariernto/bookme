<div class="form-date-search">
    <input type="hidden" class="check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}" name="start">
    <input type="text" class="check-in-out form-control" name="date" placeholder="Start date">
	<label class="forcalendar"><span class="fa fa-calendar"></span></label>
</div>
