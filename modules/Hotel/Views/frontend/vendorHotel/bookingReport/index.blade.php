<h2 class="title-bar no-border-bottom">
    {{__("Booking Report")}}
</h2>
@include('admin.message')
<div class="booking-history-manager">
    <div class="tabbable">
        <ul class="nav nav-tabs ht-nav-tabs">
            <?php $status_type = Request::query('status'); ?>
            <li class="@if(empty($status_type)) active @endif">
                <a href="{{ route("hotel.vendor.booking_report") }}">{{__("All Booking")}}</a>
            </li>
            @if(!empty($statues))
                @foreach($statues as $status)
                    <li class="@if(!empty($status_type) && $status_type == $status) active @endif">
                        <a href="{{ route("hotel.vendor.booking_report",['status' => $status]) }}">{{booking_status_to_text($status)}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
        @if(!empty($bookings) and $bookings->total() > 0)
            <div class="tab-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-booking-history">
                        <thead>
                        <tr>
                            <th width="2%">{{__("Type")}}</th>
                            <th>{{__("Title")}}</th>
                            <th class="a-hidden">{{__("Order Date")}}</th>
                            <th class="a-hidden">{{__("Execution Time")}}</th>
                            <th>{{__("Total")}}</th>
                            <th>{{__("Paid")}}</th>
                            <th>{{__("Remain")}}</th>
                            <th class="a-hidden">{{__("Status")}}</th>
                            <th>{{__("Action")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            @include('Hotel::frontend.vendorHotel.bookingReport.loop')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bravo-pagination">
                    {{$bookings->appends(request()->query())->links()}}
                </div>
            </div>
        @else
            {{__("No Booking")}}
        @endif
    </div>
</div>
