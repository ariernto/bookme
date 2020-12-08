@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Vendor Requests")}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{route('user.admin.userUpgradeRequestApproved')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="approved">{{__(" Approved ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
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
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{ __('Role request')}}</th>
                            <th class="date">{{ __('Date request')}}</th>
                            <th class="date">{{ __('Date approved')}}</th>
                            <th>{{ __('Approved By')}}</th>
                            <th class="status">{{__('Status')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($rows->total() > 0)
                            @foreach($rows as $row)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{$row->id}}" class="check-item"></td>
                                    <td class="title">
                                        <a href="{{url('admin/module/user/edit/'.$row->user->id)}}">{{@$row->user->getDisplayName()}}</a>
                                    </td>
                                    <td>{{$row->user->email}}</td>
                                    <td>
                                        @php $role = $row->role;
                                    if(!empty($role)){
                                        echo e(ucfirst($role->name));
                                    }
                                        @endphp
                                    </td>
                                    <td>{{ display_date($row->created_at)}}</td>
                                    <td>{{ $row->approved_time ? display_date($row->approved_time) : ''}}</td>
                                    <td>{{ $row->approvedBy->getDisplayName()}}</td>
                                    <td class="status"><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                    <td>
                                        @if($row->status!='approved')
                                            <a class="btn btn-sm btn-info approve-user" data-id="{{$row->id}}"  href="{{route('user.admin.upgradeId',['id' => $row->id])}}">{{__('Approve')}}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">{{__("No data")}}</td>
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

@section('script.body')
    <script>
        $(document).ready(function () {
            $('.approve-user').click(function (e) {
                e.preventDefault();
                if(confirm('Are you sure approve?')){
                    ids = '<input type="hidden" name="ids[]" value="'+$(this).data('id')+'">';
                    form = $('.dungdt-apply-form-btn').closest('form');
                    form.append(ids);
                    form.find('select').val('approved');
                    form.submit();
                }
            })
        })
    </script>
@endsection
