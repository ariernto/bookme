@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__('Template Management')}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/template/importTemplate')}}" class="btn btn-info">{{__('Import new Template')}}</a>
                <a href="{{url('admin/module/template/create')}}" class="btn btn-primary">{{__('Add new Template')}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/template/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{url('/admin/module/template/')}} " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search')}}</button>
                </form>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title">{{__('All templates')}}</div>
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Export')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($rows) > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}"></td>
                                        <td class="title">
                                            <a href="{{url('admin/module/template/edit/'.$row->id)}}">{{$row->title}}</a>
                                        </td>
                                        <td>{{$row->updated_at}}</td>
                                        <td><a class="btn btn-sm btn-primary" href="{{route('template.admin.exportTemplate',[$row->id])}}"> <i class="fa fa-download" aria-hidden="true"></i> {{__('Export')}}</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">{{__("No data")}}</td>
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
