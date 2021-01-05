@extends('admin.layouts.app')
@section('title','News')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All news")}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/news/create')}}" class="btn btn-primary">{{__("Add new Post")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/news/bulkEdit')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="publish">{{__(" Publish ")}}</option>
                            <option value="draft">{{__(" Move to Draft ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{url('/admin/module/news/')}} " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}"
                           class="form-control">
                    <select name="cate_id" class="form-control">
                        <option value="">{{ __('--All Category --')}} </option>
                        <?php
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                printf("<option value='%s' >%s</option>", $category->id, $category->name);
                            }
                        }
                        ?>
                    </select>
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search News')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> {{ __('Name')}}</th>
                                    <th width="200px"> {{ __('Category')}}</th>
                                    <th width="130px"> {{ __('Author')}}</th>
                                    <th width="100px"> {{ __('Date')}}</th>
                                    <th width="100px">{{  __('Status')}}</th>
                                    <th width="100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title">
                                                <a href="{{$row->getEditUrl()}}">{{$row->title}}</a>
                                            </td>
                                            <td>{{$row->getCategory->name ?? '' }}</td>
                                            <td>
                                                @if(!empty($row->getAuthor))
                                                    {{$row->getAuthor->getDisplayName()}}
                                                @else
                                                    {{__("[Author Deleted]")}}
                                                @endif
                                            </td>
                                            <td> {{ display_date($row->updated_at)}}</td>
                                            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                            <td>
                                                <a href="{{route('news.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">{{__("No data")}}</td>
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
        </div>
    </div>
@endsection
