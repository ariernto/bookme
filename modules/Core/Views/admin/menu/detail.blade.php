@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" id="menu-app" data-id="{{$row->id ?? ''}}" v-cloak>
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">
                @if(!empty($row->id))
                    {{__("Edit Menu:")}} @{{name}}
                @else
                    {{__('Create new menu')}}
                @endif
            </h1>
        </div>
        <div class="alert" v-show="message.content" :class="message.type ? 'alert-success' : 'alert-danger'">
            @{{message.content}}
        </div>
        <input type="text" class="form-control" value="{{$row->name ?? ''}}" v-model="name"
               placeholder="{{__('Menu name')}}">
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-xl-3 menu-item-types">
                <div v-for="(type,index) in item_types" class="panel panel-toggle-able">
                    <div class="panel-title" @click="type.open = type.open ? false : true">@{{type.name}}
                        <i class="icon ion-md-arrow-dropdown"></i>
                    </div>
                    <div class="panel-body" v-show="type.open">
                        <input type="text" placeholder="{{__('Search...')}}" class="form-control input-sm menu-search"
                               @keyup="searchItems(type)" v-model="type.q">
                        <div class="list-scrollable" v-show="type.items.length">
                            <div v-for="item in type.items"><label><input v-model="type.selected" type="checkbox"
                                                                          :value="item.id"> @{{item.name}}</label></div>
                        </div>
                        <div class="alert-text danger mt10" v-show="!type.items.length">{{__("No items found")}}</div>
                        <div class="text-right">
                            <span class="btn btn-sm btn-primary" @click="addToMenu(type)">{{__('Add to Menu')}}</span>
                        </div>
                    </div>
                </div>
                <div class="panel panel-toggle-able">
                    <div class="panel-title" @click="custom_show = custom_show ? false : true">{{__('Custom Url')}}
                        <i class="icon ion-md-arrow-dropdown"></i>
                    </div>
                    <div class="panel-body" v-show="custom_show">
                        <div class="form-group">
                            <label>{{__('URL')}}</label>
                            <input type="text" v-model="custom_url" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>{{__('Link Text')}}</label>
                            <input type="text" v-model="custom_name" class="form-control input-sm">
                        </div>
                        <div class="text-right">
                            <span class="btn btn-sm btn-primary" @click="addCustomUrl">{{__('Add to Menu')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-9">
                @include('Language::admin.navigation')
                <div class="lang-content-box">
                    <div class="panel">
                    <div class="panel-title">{{__('Menu items')}}</div>
                    <div class="panel-body">
                        <div class="menu-items-zone">
                            <Draggable-Tree :value="items" draggable cross-tree :triggerClass="triggerClass">
                                <div slot-scope="{node,index, path, tree}" class="nestable-item-content" >
                                    <div class="menu-title drag-trigger">@{{node.name}}
                                        <span class="menu-right">
                                        <span class="model-name">@{{node.model_name}}</span>
                                        <i class="icon ion-md-arrow-dropdown" @click="toogleItem(node)"></i>
                                        </span>
                                    </div>
                                    <div class="menu-info" v-show="node._open">
                                        <div class="form-group">
                                            <label>{{__('Label')}}</label>
                                            <input type="text" v-model="node.name" class="form-control input-sm">
                                        </div>
                                        <div class="form-group" v-show="node.item_model=='custom'">
                                            <label>{{__('URL')}}</label>
                                            <input type="text" v-model="node.url" class="form-control input-sm">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{__('Class')}}</label>
                                                    <input type="text" v-model="node.class"
                                                           class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{__('Target')}}</label>
                                                    <select v-model="node.target" class="input-sm form-control">
                                                        <option value="">{{__('Normal')}}</option>
                                                        <option value="_blank">{{__('Open new tab')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <a href='#' @click="deleteMenuItem($event,node,tree,path)"
                                               class="alert-text danger delete-menu-item">{{__('Delete')}}</a>
                                            <span v-show="node.origin_name">{{__('Origin: ')}} <a
                                                        :href="node.origin_edit_url" target="_blank">@{{node.origin_name}}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </Draggable-Tree>
                        </div>
                        <br>
                        <br>
                        <h3 class="panel-body-title">{{__('Menu Configs')}}</h3>
                        <div class="menu-locations">
                            @foreach($locations as $location=>$name)
                                <div>
                                    <label><input type="checkbox" v-model="locations" value="{{$location}}">{{$name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <span class="alert-text" v-show="message.content" :class="message.type ? 'success' : 'danger'">@{{message.content}} &nbsp;</span>
                        <span class="btn btn-success" @click="saveMenu">{{__("Save Menu")}}</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var current_menu_items = {!! json_encode($translation->items_json) ?? '[]' !!};
        var current_menu_name = '{{$row->name}}';
        var current_menu_locations = {!! json_encode($current_menu_locations) ?? '[]' !!};
        var current_items_index = {{$translation->lastIndex}};
        var current_menu_lang = '{{request()->query('lang',app()->getLocale())}}';
    </script>
@endsection
