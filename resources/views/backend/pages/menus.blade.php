@push('css')
    @include('admin_template.theme.datatable_css')
    <style>
        /**
                *  Nestable css
                */
        .dd {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            max-width: 600px;
            list-style: none;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-list {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .dd-list .dd-list {
            padding-left: 30px;
        }

        .dd-collapsed .dd-list {
            display: none;
        }

        .dd-item,
        .dd-empty,
        .dd-placeholder {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 20px;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-handle {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            cursor: move;
            margin: 0 0 10px;
            background: #dbdbdb;
            /*    color: #6f6f6f;*/
            padding: 5px 12px
        }

        .dd-handle:hover {
            color: #2ea8e5;
            background: #fff;
        }

        .dd-item>button {
            /*  display: block;
                  position: relative;
                  cursor: pointer;
                  float: left;
                  width: 25px;
                  height: 20px;
                  margin: 5px 0;
                  padding: 0;
                  text-indent: 100%;
                  white-space: nowrap;
                  overflow: hidden;
                  border: 0;
                  background: transparent;
                  font-size: 12px;
                  line-height: 1;
                  text-align: center;
                  font-weight: bold;*/
            position: relative;
            cursor: pointer;
            float: left;
            width: 25px;
            height: 30px;
            margin: 0px 0px;
            padding: 0;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 0;
            background: #4CAF50;
            font-size: 12px;
            line-height: 1;
            color: #fff;
            text-align: center;
            font-weight: bold;

        }

        .dd-item>button:before {
            content: '+';
            display: block;
            position: absolute;
            width: 100%;
            text-align: center;
            text-indent: 0;
        }

        .dd-item>button[data-action="collapse"]:before {
            content: '-';
        }

        .dd-placeholder,
        .dd-empty {
            margin: 5px 0;
            padding: 0;
            min-height: 30px;
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .dd-empty {
            border: 1px dashed #bbb;
            min-height: 100px;
            background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 9999;
        }

        .dd-dragel>.dd-item .dd-handle {
            margin-top: 0;
        }

        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
            box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        }

        /**
                * Nestable Extras
                */
        .nestable-lists {
            display: block;
            clear: both;
            padding: 30px 0;
            width: 100%;
            border: 0;
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
        }

        #nestable-menu {
            padding: 0;
            margin: 20px 0;
        }

        #nestable-output,
        #nestable2-output {
            width: 100%;
            height: 7em;
            font-size: 0.75em;
            line-height: 1.333333em;
            font-family: Consolas, monospace;
            padding: 5px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        #nestable2 .dd-handle {
            color: #fff;
            border: 1px solid #999;
            background: #bbb;
            background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
            background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
            background: linear-gradient(top, #bbb 0%, #999 100%);
        }

        #nestable2 .dd-handle:hover {
            background: #bbb;
        }

        #nestable2 .dd-item>button:before {
            color: #fff;
        }

        .dd {
            //  float: left;
            //  width: 48 %;
            width: 80%;
        }

        .dd+.dd {
            margin-left: 2%;
        }

        .dd-hover>.dd-handle {
            background: #2ea8e5 !important;
        }

        /**
                * Nestable Draggable Handles
                */
        .dd3-content {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px 5px 40px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .dd3-content:hover {
            color: #2ea8e5;
            background: #fff;
        }

        .dd-dragel>.dd3-item>.dd3-content {
            margin: 0;
        }

        .dd3-item>button {
            margin-left: 30px;
        }

        .dd3-handle {
            position: absolute;
            margin: 0;
            left: 0;
            top: 0;
            cursor: pointer;
            width: 30px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .dd3-handle:before {
            content: '≡';
            display: block;
            position: absolute;
            left: 0;
            top: 3px;
            width: 100%;
            text-align: center;
            text-indent: 0;
            color: #fff;
            font-size: 20px;
            font-weight: normal;
        }

        .dd3-handle:hover {
            background: #ddd;
        }


        /*
                * Nestable++
                */
        .button-delete {
            position: absolute;
            top: 4px;
            right: -26px;
        }

        .button-edit {
            position: absolute;
            top: 4px;
            right: -52px;
        }

        #saveButton {
            padding-right: 30px;
            padding-left: 30px;
        }

        .output-container {
            margin-top: 20px;
        }

        #json-output {
            margin-top: 20px;
        }
    </style>
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Menu') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Menu'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0">Menu Designs <button type="button" class="btn btn-success"
                                onclick="update_menus()">Save</button></h1>            
                        </div>
                        <div class="card-body">
                            <div class="dd nestable" id="nestable">
                                @php
                                    $m = \App\Models\Menu::where('parent', 0)
                                        ->orderBy('order_level')
                                        ->get();
                                @endphp
                                @include('backend.pages.menu_list', ['menus' => $m])
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" onclick="show_add_model()">Add</button>

                        </div>
                    </div>
                </div>
            </div>
 
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="edit_model">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editing <span id="currentEditName"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"  style="overflow-y: scroll;height:80vh;">
                    <form class="" id="menu-editor" style="display: none;">
                        <div class="form-group">
                            <label for="editInputName">Name</label>
                            <input type="text" class="form-control" id="editInputName" placeholder="Item name"
                                required>
                        </div>
                        
                        <div class="form-group">
                            <label for="editInputSlug">Slug</label>
                            <input type="text" class="form-control" id="editInputSlug" placeholder="item-slug">
                        </div>
                        <div class="form-group">
                            <label for="editInputUrl">Url</label>
                            <input type="text" class="form-control" id="editInputUrl" placeholder="item-Url">
                        </div>
                        <div class="form-group">
                            <label for="editInputRoute" class="col-form-label">{{ __('Select Page')}}</label>
                            <select class="form-control" id="editInputRoute" name="page_route">
                                <option value="">Select Page</option>
                                @foreach ($routes as $route)
                                    @if($route != 'site.product_detail' && $route != 'site.blog_detail' )
                                        <option value="{{ $route }}">{{  str_replace(url("/").'/'," ",route($route));  }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editInputMetaTitle">Meta Title</label>
                            <input type="text" class="form-control" id="editInputMetaTitle" placeholder="Meta Title"
                                >
                        </div>
                        <div class="form-group">
                            <label for="editInputMetaDescription">Meta Description</label>
                            <input type="text" class="form-control" id="editInputMetaDescription"
                                placeholder="Meta Description" >
                        </div>
                        <div class="form-group">
                            <label for="editInputImage">{{ __('Image')}} <small>({{  __('120x80') }})</small></label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{  __('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{  __('Choose File') }}</div>
                                <input type="hidden" name="editInputImage" id="editInputImage" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editInputExtraClass1">Full Dropdown    &nbsp;</label>
                            <input type="radio" id="editInputExtraClass1" class="editInputExtraClass" name="dropdown_type_edit" value="1" placeholder="item-ExtraClass"
                                >
                            &nbsp;&nbsp;
                            <label for="editInputExtraClass2">Small Dropdown    &nbsp;</label>
                            <input type="radio" id="editInputExtraClass2" class="editInputExtraClass"  name="dropdown_type_edit" value="2" placeholder="item-ExtraClass"
                                >
                        </div>
                        <div>&nbsp;</div>
                        <button class="btn btn-info" id="editButton">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="show_add_model">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"   style="overflow-y: scroll;height:80vh;">
                    <form class="form" id="menu-add">
                        <div class="form-group">
                            <label for="addInputName">Name</label>
                            <input type="text" class="form-control" id="addInputName" placeholder="Item name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="addInputRoute" class="col-form-label">{{ __('Select Page')}}</label>
                            <select class="form-control" id="addInputRoute" name="page_route">
                                <option value="">Select Page</option>
                                @foreach ($routes as $route)
                                    @if($route != 'site.product_detail' && $route != 'site.blog_detail' )
                                        <option value="{{ $route }}">{{  str_replace(url("/").'/'," ",route($route));  }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="addInputSlug">Slug &nbsp;</label>
                            <input type="text" class="form-control" id="addInputSlug" placeholder="item-slug"
                                >
                        </div>
                        <div class="form-group">
                            <label for="addInputUrl">Url &nbsp;</label>
                            <input type="text" class="form-control" id="addInputUrl" placeholder="item-Url"
                                >
                        </div>
                        <div class="form-group">
                            <label for="addInputMetaTitle">Meta Title</label>
                            <input type="text" class="form-control" id="addInputMetaTitle" placeholder="Meta Title"
                                >
                        </div>
                        <div class="form-group">
                            <label for="addInputMetaDescription">Meta Description</label>
                            <input type="text" class="form-control" id="addInputMetaDescription"
                                placeholder="Meta Description" >
                        </div>
                        <div class="form-group">
                            <label for="addInputImage">{{ __('Image')}} <small>({{  __('120x80') }})</small></label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{  __('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{  __('Choose File') }}</div>
                                <input type="hidden" name="addInputImage" id="addInputImage" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addInputExtraClass1">Full Dropdown    &nbsp;</label>
                            <input type="radio" id="addInputExtraClass1" class="addInputExtraClass" name="dropdown_type" value="1" placeholder="item-ExtraClass"
                                >
                            &nbsp;&nbsp;
                            <label for="addInputExtraClass2">Small Dropdown    &nbsp;</label>
                            <input type="radio" id="addInputExtraClass2" class="addInputExtraClass"  name="dropdown_type" value="2" placeholder="item-ExtraClass"
                                checked>
                        </div>
                        <button class="btn btn-primary" id="addButton"> <i class="fa fa-plus-circle"
                                aria-hidden="true"></i>
                            Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script src="{{ asset('theme/admin/plugins/jquery.nestable.js') }}"></script>


        <script>
            /*jslint browser: true, devel: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
            /*global $ */

            /*************** General ***************/

            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    if (output) {
                        output.val(window.JSON.stringify(list.nestable('serialize')));
                    }
                } else {
                    alert('JSON browser support required for this page.');
                }
            };

            var nestableList = $("#nestable > .dd-list");

            /***************************************/


            /*************** Delete ***************/

            var deleteFromMenuHelper = function(target) {
                if (target.data('new') == 1) {
                    // if it's not yet saved in the database, just remove it from DOM
                    target.fadeOut(function() {
                        target.remove();
                        updateOutput($('#nestable').data('output', $('#json-output')));
                    });
                } else {
                    // otherwise hide and mark it for deletion
                    target.appendTo(nestableList); // if children, move to the top level
                    target.data('deleted', '1');
                    target.fadeOut();
                }
            };

            var deleteFromMenu = function() {
                var targetId = $(this).data('owner-id');
                var target = $('[data-id="' + targetId + '"]');

                var result = confirm("Delete " + target.data('name') + " and all its subitems ?");
                if (!result) {
                    return;
                }

                // Remove children (if any)
                target.find("li").each(function() {
                    deleteFromMenuHelper($(this));
                });

                // Remove parent
                deleteFromMenuHelper(target);

                // update JSON
                updateOutput($('#nestable').data('output', $('#json-output')));
            };

            /***************************************/


            /*************** Edit ***************/

            var menuEditor = $("#menu-editor");
            var editButton = $("#editButton");
            var editInputName = $("#editInputName");
            var editInputImage = $("#editInputImage");
            var editInputSlug = $("#editInputSlug");
            var editInputUrl = $("#editInputUrl");
            var editInputRoute = $("#editInputRoute");
            var editInputExtraClass = $(".editInputExtraClass");
            var editInputMetaTitle = $("#editInputMetaTitle");
            var editInputMetaDescription = $("#editInputMetaDescription");
                
            var currentEditName = $("#currentEditName");

            // Prepares and shows the Edit Form
            var prepareEdit = function() {
                var targetId = $(this).data('owner-id');
                var target = $('[data-id="' + targetId + '"]');
                console.log(target.data("dropdown_type"));
                editInputName.val(target.data("name"));
                editInputImage.val(target.data("image"));
                editInputSlug.val(target.data("slug"));
                editInputUrl.val(target.data("url"));
                $('#editInputRoute option:eq('+target.data("route")+')').attr("checked", "checked");
                $('#editInputRoute option:eq('+target.data("route")+')').prop("checked", true);
                $('#editInputExtraClass'+target.data("dropdown_type")).attr("checked", "checked");
                $('#editInputExtraClass'+target.data("dropdown_type")).prop("checked", true);
                editInputMetaDescription.val(target.data("metadescription"));
                editInputMetaTitle.val(target.data("metatitle"));
                currentEditName.html(target.data("name"));
                editButton.data("owner-id", target.data("id"));

                console.log("[INFO] Editing Menu Item " + editButton.data("owner-id"));

                menuEditor.fadeIn();
                DSJ.uploader.previewGenerate();
                $('#edit_model').modal('show');
            };

            // Edits the Menu item and hides the Edit Form
            var editMenuItem = function() {
                var targetId = $(this).data('owner-id');
                var target = $('[data-id="' + targetId + '"]');
                var newName = editInputName.val();
                var newImage = editInputImage.val();
                var newSlug = editInputSlug.val();
                var newUrl = editInputUrl.val();
                var newRoute = editInputRoute.find(':selected').val();
                var newExtraClass = $('input[name="dropdown_type_edit"]:checked').val();
                var newMetaTitle = editInputMetaTitle.val();
                var newMetaDesctiption = editInputMetaDescription.val();
                target.data("name", newName);
                target.data("image", newImage);
                target.data("slug", newSlug);
                target.data("url", newUrl);
                target.data("route", newRoute);
                target.data("dropdown_type", newExtraClass);
                target.data("metatitle", newMetaTitle);
                target.data("metadescription", newMetaDesctiption);

                target.find("> .dd-handle").html(newName);

                menuEditor.fadeOut();
                $('#edit_model').modal('hide');

                // update JSON
                updateOutput($('#nestable').data('output', $('#json-output')));
            };

            /***************************************/


            /*************** Add ***************/

            var newIdCount = 1;

            var addToMenu = function() {
                var newName = $("#addInputName").val();
                var newImage = $("#addInputImage").val();
                var newSlug = $("#addInputSlug").val();
                var newUrl = $("#addInputUrl").val();
                var newRoute = $("#addInputRoute").find(':selected').val();
                var newExtraClass = $('input[name="dropdown_type_edit"]:checked').val();
                var newMetaTitle = $("#addInputMetaTitle").val();
                var newMetaDescription = $("#addInputMetaDescription").val();
                var newId = 'new-' + newIdCount;

                nestableList.append(
                    '<li class="dd-item" ' +
                    'data-id="' + newId + '" ' +
                    'data-name="' + newName + '" ' +
                    'data-image="' + newImage + '" ' +
                    'data-slug="' + newSlug + '" ' +
                    'data-url="' + newUrl + '" ' +
                    'data-route="' + newRoute + '" ' +
                    'data-dropdown_type="' + newExtraClass + '" ' +
                    'data-metatitle="' + newMetaTitle + '" ' +
                    'data-metadescription="' + newMetaDescription + '" ' +
                    'data-new="1" ' +
                    'data-deleted="0">' +
                    '<div class="dd-handle">' + newName + '</div> ' +
                    '<span class="button-delete btn btn-danger btn-xs pull-right" ' +
                    'data-owner-id="' + newId + '"> ' +
                    '<i class="fa fa-times" aria-hidden="true"></i> ' +
                    '</span>' +
                    '<span class="button-edit btn btn-success btn-xs pull-right" ' +
                    'data-owner-id="' + newId + '">' +
                    '<i class="fa fa-edit" aria-hidden="true"></i>' +
                    '</span>' +
                    '</li>'
                );

                newIdCount++;

                // update JSON
                updateOutput($('#nestable').data('output', $('#json-output')));

                // set events
                $("#nestable .button-delete").on("click", deleteFromMenu);
                $("#nestable .button-edit").on("click", prepareEdit);
                $('#show_add_model').modal('hide');
            };



            /***************************************/



            $(function() {

                // output initial serialised data
                updateOutput($('#nestable').data('output', $('#json-output')));

                // set onclick events
                editButton.on("click", editMenuItem);

                $("#nestable .button-delete").on("click", deleteFromMenu);

                $("#nestable .button-edit").on("click", prepareEdit);

                $("#menu-editor").submit(function(e) {
                    e.preventDefault();
                });

                $("#menu-add").submit(function(e) {
                    e.preventDefault();
                    addToMenu();
                });

            });



            /*!
             * Nestable jQuery Plugin - Copyright (c) 2012 David Bushell - http://dbushell.com/
             * Dual-licensed under the BSD or MIT licenses
             */
            ;
            (function($, window, document, undefined) {
                var hasTouch = 'ontouchstart' in document;

                /**
                 * Detect CSS pointer-events property
                 * events are normally disabled on the dragging element to avoid conflicts
                 * https://github.com/ausi/Feature-detection-technique-for-pointer-events/blob/master/modernizr-pointerevents.js
                 */
                var hasPointerEvents = (function() {
                    var el = document.createElement('div'),
                        docEl = document.documentElement;
                    if (!('pointerEvents' in el.style)) {
                        return false;
                    }
                    el.style.pointerEvents = 'auto';
                    el.style.pointerEvents = 'x';
                    docEl.appendChild(el);
                    var supports = window.getComputedStyle && window.getComputedStyle(el, '').pointerEvents ===
                        'auto';
                    docEl.removeChild(el);
                    return !!supports;
                })();

                var defaults = {
                    listNodeName: 'ol',
                    itemNodeName: 'li',
                    rootClass: 'dd',
                    listClass: 'dd-list',
                    itemClass: 'dd-item',
                    dragClass: 'dd-dragel',
                    handleClass: 'dd-handle',
                    collapsedClass: 'dd-collapsed',
                    placeClass: 'dd-placeholder',
                    noDragClass: 'dd-nodrag',
                    emptyClass: 'dd-empty',
                    expandBtnHTML: '<button data-action="expand" type="button">Expand</button>',
                    collapseBtnHTML: '<button data-action="collapse" type="button">Collapse</button>',
                    group: 0,
                    maxDepth: 5,
                    threshold: 20
                };

                function Plugin(element, options) {
                    this.w = $(document);
                    this.el = $(element);
                    this.options = $.extend({}, defaults, options);
                    this.init();
                }

                Plugin.prototype = {

                    init: function() {
                        var list = this;

                        list.reset();

                        list.el.data('nestable-group', this.options.group);

                        list.placeEl = $('<div class="' + list.options.placeClass + '"/>');

                        $.each(this.el.find(list.options.itemNodeName), function(k, el) {
                            list.setParent($(el));
                        });

                        list.el.on('click', 'button', function(e) {
                            if (list.dragEl) {
                                return;
                            }
                            var target = $(e.currentTarget),
                                action = target.data('action'),
                                item = target.parent(list.options.itemNodeName);
                            if (action === 'collapse') {
                                list.collapseItem(item);
                            }
                            if (action === 'expand') {
                                list.expandItem(item);
                            }
                        });

                        var onStartEvent = function(e) {
                            var handle = $(e.target);
                            if (!handle.hasClass(list.options.handleClass)) {
                                if (handle.closest('.' + list.options.noDragClass).length) {
                                    return;
                                }
                                handle = handle.closest('.' + list.options.handleClass);
                            }

                            if (!handle.length || list.dragEl) {
                                return;
                            }

                            list.isTouch = /^touch/.test(e.type);
                            if (list.isTouch && e.touches.length !== 1) {
                                return;
                            }

                            e.preventDefault();
                            list.dragStart(e.touches ? e.touches[0] : e);
                        };

                        var onMoveEvent = function(e) {
                            if (list.dragEl) {
                                e.preventDefault();
                                list.dragMove(e.touches ? e.touches[0] : e);
                            }
                        };

                        var onEndEvent = function(e) {
                            if (list.dragEl) {
                                e.preventDefault();
                                list.dragStop(e.touches ? e.touches[0] : e);
                            }
                        };

                        if (hasTouch) {
                            list.el[0].addEventListener('touchstart', onStartEvent, false);
                            window.addEventListener('touchmove', onMoveEvent, false);
                            window.addEventListener('touchend', onEndEvent, false);
                            window.addEventListener('touchcancel', onEndEvent, false);
                        }

                        list.el.on('mousedown', onStartEvent);
                        list.w.on('mousemove', onMoveEvent);
                        list.w.on('mouseup', onEndEvent);

                    },

                    serialize: function() {
                        var data,
                            depth = 0,
                            list = this;
                        step = function(level, depth) {
                            var array = [],
                                items = level.children(list.options.itemNodeName);
                            items.each(function() {
                                var li = $(this),
                                    item = $.extend({}, li.data()),
                                    sub = li.children(list.options.listNodeName);
                                if (sub.length) {
                                    item.children = step(sub, depth + 1);
                                }
                                array.push(item);
                            });
                            return array;
                        };
                        data = step(list.el.find(list.options.listNodeName).first(), depth);
                        return data;
                    },

                    serialise: function() {
                        return this.serialize();
                    },

                    reset: function() {
                        this.mouse = {
                            offsetX: 0,
                            offsetY: 0,
                            startX: 0,
                            startY: 0,
                            lastX: 0,
                            lastY: 0,
                            nowX: 0,
                            nowY: 0,
                            distX: 0,
                            distY: 0,
                            dirAx: 0,
                            dirX: 0,
                            dirY: 0,
                            lastDirX: 0,
                            lastDirY: 0,
                            distAxX: 0,
                            distAxY: 0
                        };
                        this.isTouch = false;
                        this.moving = false;
                        this.dragEl = null;
                        this.dragRootEl = null;
                        this.dragDepth = 0;
                        this.hasNewRoot = false;
                        this.pointEl = null;
                    },

                    expandItem: function(li) {
                        li.removeClass(this.options.collapsedClass);
                        li.children('[data-action="expand"]').hide();
                        li.children('[data-action="collapse"]').show();
                        li.children(this.options.listNodeName).show();
                    },

                    collapseItem: function(li) {
                        var lists = li.children(this.options.listNodeName);
                        if (lists.length) {
                            li.addClass(this.options.collapsedClass);
                            li.children('[data-action="collapse"]').hide();
                            li.children('[data-action="expand"]').show();
                            li.children(this.options.listNodeName).hide();
                        }
                    },

                    expandAll: function() {
                        var list = this;
                        list.el.find(list.options.itemNodeName).each(function() {
                            list.expandItem($(this));
                        });
                    },

                    collapseAll: function() {
                        var list = this;
                        list.el.find(list.options.itemNodeName).each(function() {
                            list.collapseItem($(this));
                        });
                    },

                    setParent: function(li) {
                        if (li.children(this.options.listNodeName).length) {
                            li.prepend($(this.options.expandBtnHTML));
                            li.prepend($(this.options.collapseBtnHTML));
                        }
                        li.children('[data-action="expand"]').hide();
                    },

                    unsetParent: function(li) {
                        li.removeClass(this.options.collapsedClass);
                        li.children('[data-action]').remove();
                        li.children(this.options.listNodeName).remove();
                    },

                    dragStart: function(e) {
                        var mouse = this.mouse,
                            target = $(e.target),
                            dragItem = target.closest(this.options.itemNodeName);

                        this.placeEl.css('height', dragItem.height());

                        mouse.offsetX = e.offsetX !== undefined ? e.offsetX : e.pageX - target.offset().left;
                        mouse.offsetY = e.offsetY !== undefined ? e.offsetY : e.pageY - target.offset().top;
                        mouse.startX = mouse.lastX = e.pageX;
                        mouse.startY = mouse.lastY = e.pageY;

                        this.dragRootEl = this.el;

                        this.dragEl = $(document.createElement(this.options.listNodeName)).addClass(this.options
                            .listClass + ' ' + this.options.dragClass);
                        this.dragEl.css('width', dragItem.width());

                        dragItem.after(this.placeEl);
                        dragItem[0].parentNode.removeChild(dragItem[0]);
                        dragItem.appendTo(this.dragEl);

                        $(document.body).append(this.dragEl);
                        this.dragEl.css({
                            'left': e.pageX - mouse.offsetX,
                            'top': e.pageY - mouse.offsetY
                        });
                        // total depth of dragging item
                        var i, depth,
                            items = this.dragEl.find(this.options.itemNodeName);
                        for (i = 0; i < items.length; i++) {
                            depth = $(items[i]).parents(this.options.listNodeName).length;
                            if (depth > this.dragDepth) {
                                this.dragDepth = depth;
                            }
                        }
                    },

                    dragStop: function(e) {
                        var el = this.dragEl.children(this.options.itemNodeName).first();
                        el[0].parentNode.removeChild(el[0]);
                        this.placeEl.replaceWith(el);

                        this.dragEl.remove();
                        this.el.trigger('change');
                        if (this.hasNewRoot) {
                            this.dragRootEl.trigger('change');
                        }
                        this.reset();
                    },

                    dragMove: function(e) {
                        var list, parent, prev, next, depth,
                            opt = this.options,
                            mouse = this.mouse;

                        this.dragEl.css({
                            'left': e.pageX - mouse.offsetX,
                            'top': e.pageY - mouse.offsetY
                        });

                        // mouse position last events
                        mouse.lastX = mouse.nowX;
                        mouse.lastY = mouse.nowY;
                        // mouse position this events
                        mouse.nowX = e.pageX;
                        mouse.nowY = e.pageY;
                        // distance mouse moved between events
                        mouse.distX = mouse.nowX - mouse.lastX;
                        mouse.distY = mouse.nowY - mouse.lastY;
                        // direction mouse was moving
                        mouse.lastDirX = mouse.dirX;
                        mouse.lastDirY = mouse.dirY;
                        // direction mouse is now moving (on both axis)
                        mouse.dirX = mouse.distX === 0 ? 0 : mouse.distX > 0 ? 1 : -1;
                        mouse.dirY = mouse.distY === 0 ? 0 : mouse.distY > 0 ? 1 : -1;
                        // axis mouse is now moving on
                        var newAx = Math.abs(mouse.distX) > Math.abs(mouse.distY) ? 1 : 0;

                        // do nothing on first move
                        if (!mouse.moving) {
                            mouse.dirAx = newAx;
                            mouse.moving = true;
                            return;
                        }

                        // calc distance moved on this axis (and direction)
                        if (mouse.dirAx !== newAx) {
                            mouse.distAxX = 0;
                            mouse.distAxY = 0;
                        } else {
                            mouse.distAxX += Math.abs(mouse.distX);
                            if (mouse.dirX !== 0 && mouse.dirX !== mouse.lastDirX) {
                                mouse.distAxX = 0;
                            }
                            mouse.distAxY += Math.abs(mouse.distY);
                            if (mouse.dirY !== 0 && mouse.dirY !== mouse.lastDirY) {
                                mouse.distAxY = 0;
                            }
                        }
                        mouse.dirAx = newAx;

                        /**
                         * move horizontal
                         */
                        if (mouse.dirAx && mouse.distAxX >= opt.threshold) {
                            // reset move distance on x-axis for new phase
                            mouse.distAxX = 0;
                            prev = this.placeEl.prev(opt.itemNodeName);
                            // increase horizontal level if previous sibling exists and is not collapsed
                            if (mouse.distX > 0 && prev.length && !prev.hasClass(opt.collapsedClass)) {
                                // cannot increase level when item above is collapsed
                                list = prev.find(opt.listNodeName).last();
                                // check if depth limit has reached
                                depth = this.placeEl.parents(opt.listNodeName).length;
                                if (depth + this.dragDepth <= opt.maxDepth) {
                                    // create new sub-level if one doesn't exist
                                    if (!list.length) {
                                        list = $('<' + opt.listNodeName + '/>').addClass(opt.listClass);
                                        list.append(this.placeEl);
                                        prev.append(list);
                                        this.setParent(prev);
                                    } else {
                                        // else append to next level up
                                        list = prev.children(opt.listNodeName).last();
                                        list.append(this.placeEl);
                                    }
                                }
                            }
                            // decrease horizontal level
                            if (mouse.distX < 0) {
                                // we can't decrease a level if an item preceeds the current one
                                next = this.placeEl.next(opt.itemNodeName);
                                if (!next.length) {
                                    parent = this.placeEl.parent();
                                    this.placeEl.closest(opt.itemNodeName).after(this.placeEl);
                                    if (!parent.children().length) {
                                        this.unsetParent(parent.parent());
                                    }
                                }
                            }
                        }

                        var isEmpty = false;

                        // find list item under cursor
                        if (!hasPointerEvents) {
                            this.dragEl[0].style.visibility = 'hidden';
                        }
                        this.pointEl = $(document.elementFromPoint(e.pageX - document.body.scrollLeft, e.pageY - (
                            window.pageYOffset || document.documentElement.scrollTop)));
                        if (!hasPointerEvents) {
                            this.dragEl[0].style.visibility = 'visible';
                        }
                        if (this.pointEl.hasClass(opt.handleClass)) {
                            this.pointEl = this.pointEl.parent(opt.itemNodeName);
                        }
                        if (this.pointEl.hasClass(opt.emptyClass)) {
                            isEmpty = true;
                        } else if (!this.pointEl.length || !this.pointEl.hasClass(opt.itemClass)) {
                            return;
                        }

                        // find parent list of item under cursor
                        var pointElRoot = this.pointEl.closest('.' + opt.rootClass),
                            isNewRoot = this.dragRootEl.data('nestable-id') !== pointElRoot.data('nestable-id');

                        /**
                         * move vertical
                         */
                        if (!mouse.dirAx || isNewRoot || isEmpty) {
                            // check if groups match if dragging over new root
                            if (isNewRoot && opt.group !== pointElRoot.data('nestable-group')) {
                                return;
                            }
                            // check depth limit
                            depth = this.dragDepth - 1 + this.pointEl.parents(opt.listNodeName).length;
                            if (depth > opt.maxDepth) {
                                return;
                            }
                            var before = e.pageY < (this.pointEl.offset().top + this.pointEl.height() / 2);
                            parent = this.placeEl.parent();
                            // if empty create new list to replace empty placeholder
                            if (isEmpty) {
                                list = $(document.createElement(opt.listNodeName)).addClass(opt.listClass);
                                list.append(this.placeEl);
                                this.pointEl.replaceWith(list);
                            } else if (before) {
                                this.pointEl.before(this.placeEl);
                            } else {
                                this.pointEl.after(this.placeEl);
                            }
                            if (!parent.children().length) {
                                this.unsetParent(parent.parent());
                            }
                            if (!this.dragRootEl.find(opt.itemNodeName).length) {
                                this.dragRootEl.append('<div class="' + opt.emptyClass + '"/>');
                            }
                            // parent root list has changed
                            if (isNewRoot) {
                                this.dragRootEl = pointElRoot;
                                this.hasNewRoot = this.el[0] !== this.dragRootEl[0];
                            }
                        }
                    }

                };

                $.fn.nestable = function(params) {
                    var lists = this,
                        retval = this;

                    lists.each(function() {
                        var plugin = $(this).data("nestable");

                        if (!plugin) {
                            $(this).data("nestable", new Plugin(this, params));
                            $(this).data("nestable-id", new Date().getTime());
                        } else {
                            if (typeof params === 'string' && typeof plugin[params] === 'function') {
                                retval = plugin[params]();
                            }
                        }
                    });

                    return retval || lists;
                };

            })(window.jQuery || window.Zepto, window, document);
        </script>
        <script>
            $('#nestable').nestable({
                    maxDepth: 5
                })
                .on('change', updateOutput);
        </script>
        <script>
            function update_menus() {
                console.log($('#nestable').nestable('serialize'));
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: "{{ route('menus.update') }}",
                    data: {
                        data: $('#nestable').nestable('serialize')
                    },
                    success: function(data) {
                        if (data == 1) {
                            alert('saved');
                        } else {
                            alert('unsaved');
                        }
                    },
                    error: function(data) {
                        alert('not saved')
                    }
                });
            }

            function show_add_model() {
                $('#show_add_model').modal('show');
            }
        </script>
    @endsection
</x-admin-layout>
