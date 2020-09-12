@extends('Layout::admin.app')

@section('content')
    <div class="container-fluid">
        <div id="media-management" class="cdn-browser management-page" v-cloak :class="{is_loading:isLoading}">
            <div class="d-flex flex-column">
                <div class="files-nav flex-shrink-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-left d-flex align-items-center">
                            <div class="filter-item">
                                <input type="text" placeholder="{{__("Search file name....")}}" class="form-control" v-model="filter.s" @keyup.enter="filter.page = 1;reloadLists()">
                            </div>
                            <div class="filter-item">
                                <button class="btn btn-default" @click="filter.page = 1;reloadLists()">
                                    <i class="fa fa-search"></i> {{__("Search")}}</button>
                            </div>
                            <div class="filter-item">
                                <small><i>{{__("Total")}}: @{{total}} {{__("files")}}</i></small>
                            </div>
                        </div>
                        <div class="col-right">
                            <i class="fa-spin fa fa-spinner icon-loading active" v-show="isLoading"></i>
                            <button class="btn btn-success btn-pick-files">
                                <span><i class="fa fa-upload"></i> {{__("Upload")}}</span>
                                <input multiple type="file" name="files[]" ref="files">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="upload-new" v-show="showUploader" display="none">
                    <input type="file" name="filepond[]" class="my-pond">
                </div>
                <div class="files-list">
                    <div class="files-wraps " :class="'view-'+viewType">
                        <file-item v-for="(file,index) in files" :key="index" :view-type="viewType" :selected="selected" :file="file" v-on:select-file="selectFile"></file-item>
                    </div>
                    <p class="no-files-text text-center" v-show="!total && apiFinished" style="display: none">{{__("No file found")}}</p>
                    <div class="text-center" v-if="totalPage > 1">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item" :class="{disabled:filter.page <= 1}">
                                    <a class="page-link" v-if="filter.page <=1">{{__("Previous")}}</a>
                                    <a class="page-link" href="#" v-if="filter.page > 1" v-on:click="changePage(filter.page-1,$event)">{{__("Previous")}}</a>
                                </li>
                                <li class="page-item" v-if="p >= (filter.page-3) && p <= (filter.page+3)" :class="{active: p == filter.page}" v-for="p in totalPage" @click="changePage(p,$event)">
                                    <a class="page-link" href="#">@{{p}}</a></li>
                                <li class="page-item" :class="{disabled:filter.page >= totalPage}">
                                    <a v-if="filter.page >= totalPage" class="page-link">{{__("Next")}}</a>
                                    <a href="#" class="page-link" v-if="filter.page < totalPage" v-on:click="changePage(filter.page+1,$event)">{{__("Next")}}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="browser-actions d-flex justify-content-between flex-shrink-0" v-if="selected.length">
                    <div class="col-left" v-show="selected.length">
                        <div class="control-remove" v-if="selected && selected.length">
                            <button class="btn btn-danger" @click="removeFiles">{{__("Delete file")}}</button>
                        </div>
                        <div class="control-info" v-if="selected && selected.length">
                            <div class="count-selected">@{{selected.length}} {{__("file selected")}}</div>
                            <div class="clear-selected" @click="selected=[]"><i>{{__("unselect")}}</i></div>
                        </div>
                    </div>
                    <div class="col-right d-none" v-show="selected.length">
                        <button class="btn btn-primary" :class="{disabled:!selected.length}" @click="sendFiles">{{__("Use file")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
