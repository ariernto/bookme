@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("All Tour")}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                <a href="{{route('tour.admin.create')}}" class="btn btn-primary">{{__("Add new tour")}}</a>
                @endif
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/tour/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="publish">{{__(" Publish ")}}</option>
                            <option value="draft">{{__(" Move to Draft ")}}</option>
                            <option value="pending">{{__("Move to Pending")}}</option>
                            <option value="clone">{{__(" Clone ")}}</option>
                            @if(!empty($recovery))
                                <option value="recovery">{{__(" Recovery ")}}</option>
                            @else
                                <option value="delete">{{__(" Delete ")}}</option>
                            @endif
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{ !empty($recovery) ? route('tour.admin.recovery') : route('tour.admin.index')}}" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    @if(!empty($rows) and $tour_manage_others)
                        <?php
                        $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
                        \App\Helpers\AdminForm::select2('vendor_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url'      => url('/admin/module/user/getForSelect2'),
                                    'dataType' => 'json',
                                    'data' => array("user_type"=>"vendor")
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Vendor --')
                            ]
                        ], !empty($user->id) ? [
                            $user->id,
                            $user->name_or_email . ' (#' . $user->id . ')'
                        ] : false)
                        ?>
                    @endif
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}" class="form-control">
                    <select name="cate_id" class="form-control">
                        <option value="">{{ __('--All Category --')}} </option>
                        <?php
                        foreach ($tour_categories as $category) {
                            printf("<option value='%s' >%s</option>", $category->id, $category->name);
                        }
                        ?>
                    </select>
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th> {{ __('Name')}}</th>
                                <th width="200px"> {{ __('Location')}}</th>
                                <th width="130px"> {{ __('Author')}}</th>
                                <th width="100px"> {{ __('Status')}}</th>
                                <th width="100px"> {{ __('Reviews')}}</th>
                                <th width="100px"> {{ __('Date')}}</th>
                                <th width="100px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr class="{{$row->status}}">
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                        </td>
                                        <td class="title">
                                            <a href="{{url('admin/module/tour/edit/'.$row->id)}}">{{$row->title}}</a>
                                        </td>
                                        <td>{{$row->location->name ?? ''}}</td>
                                        <td>
                                            @if(!empty($row->getAuthor))
                                                {{$row->getAuthor->getDisplayName()}}
                                            @else
                                                {{__("[Author Deleted]")}}
                                            @endif
                                        </td>
                                        <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                        <td>
                                            <a target="_blank" href="{{ url("/admin/module/review?service_id=".$row->id) }}" class="review-count-approved">
                                                {{ $row->getNumberReviewsInService() }}
                                            </a>
                                        </td>
                                        <td>{{ display_date($row->updated_at)}}</td>
                                        <td>
                                            <a href="{{route('tour.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">{{__("No data")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
