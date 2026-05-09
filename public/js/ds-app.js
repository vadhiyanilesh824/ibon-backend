$.fn.toggleAttr = function (attr, attr1, attr2) {
    return this.each(function () {
        var self = $(this);
        if (self.attr(attr) == attr1) self.attr(attr, attr2);
        else self.attr(attr, attr1);
    });
};
(function ($) {
    // USE STRICT
    "use strict";

    DSJ.data = {
        csrf: $('meta[name="csrf-token"]').attr("content"),
        appUrl: $('meta[name="app-url"]').attr("content"),
        fileBaseUrl: $('meta[name="file-base-url"]').attr("content"),
    };
    DSJ.uploader = {
        data: {
            selectedFiles: [],
            selectedFilesObject: [],
            clickedForDelete: null,
            allFiles: [],
            multiple: false,
            type: "all",
            next_page_url: null,
            prev_page_url: null,
        },
        removeInputValue: function (id, array, elem) {
            var selected = array.filter(function (item) {
                return item !== id;
            });
            if (selected.length > 0) {
                $(elem)
                    .find(".file-amount")
                    .html(DSJ.uploader.updateFileHtml(selected));
            } else {
                elem.find(".file-amount").html('Choose File');
            }
            $(elem).find(".selected-files").val(selected);
        },
        removeAttachment: function () {
            $(document).on("click",'.remove-attachment', function () {
                var value = $(this)
                    .closest(".file-preview-item")
                    .data("id");
                var selected = $(this)
                    .closest(".file-preview")
                    .prev('[data-toggle="dsjuploader"]')
                    .find(".selected-files")
                    .val()
                    .split(",")
                    .map(Number);

                DSJ.uploader.removeInputValue(
                    value,
                    selected,
                    $(this)
                        .closest(".file-preview")
                        .prev('[data-toggle="dsjuploader"]')
                );
                $(this).closest(".file-preview-item").remove();
            });
        },
        deleteUploaderFile: function () {
            $(".dsj-uploader-delete").each(function () {
                $(this).on("click", function (e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    DSJ.uploader.data.clickedForDelete = id;
                    $("#dsjUploaderDelete").modal("show");

                    $(".dsj-uploader-confirmed-delete").on("click", function (
                        e
                    ) {
                        e.preventDefault();
                        if (e.detail === 1) {
                            var clickedForDeleteObject =
                                DSJ.uploader.data.allFiles[
                                    DSJ.uploader.data.allFiles.findIndex(
                                        (x) =>
                                            x.id ===
                                            DSJ.uploader.data.clickedForDelete
                                    )
                                ];
                            $.ajax({
                                url:
                                    DSJ.data.appUrl +
                                    "/dsj-uploader/destroy/" +
                                    DSJ.uploader.data.clickedForDelete,
                                type: "DELETE",
                                dataType: "JSON",
                                data: {
                                    id: DSJ.uploader.data.clickedForDelete,
                                    _method: "DELETE",
                                    _token: DSJ.data.csrf,
                                },
                                success: function () {
                                    DSJ.uploader.data.selectedFiles = DSJ.uploader.data.selectedFiles.filter(
                                        function (item) {
                                            return (
                                                item !==
                                                DSJ.uploader.data
                                                    .clickedForDelete
                                            );
                                        }
                                    );
                                    DSJ.uploader.data.selectedFilesObject = DSJ.uploader.data.selectedFilesObject.filter(
                                        function (item) {
                                            return (
                                                item !== clickedForDeleteObject
                                            );
                                        }
                                    );
                                    DSJ.uploader.updateUploaderSelected();
                                    DSJ.uploader.getAllUploads(
                                        DSJ.data.appUrl +
                                            "/dsj-uploader/get_uploaded_files"
                                    );
                                    DSJ.uploader.data.clickedForDelete = null;
                                    $("#dsjUploaderDelete").modal("hide");
                                },
                            });
                        }
                    });
                });
            });
        },
        uploadSelect: function () {
            $(".dsj-uploader-select").each(function () {
                var elem = $(this);
                elem.on("click", function (e) {
                    var value = $(this).data("value");
                    var valueObject =
                        DSJ.uploader.data.allFiles[
                            DSJ.uploader.data.allFiles.findIndex(
                                (x) => x.id === value
                            )
                        ];
                    // console.log(valueObject);

                    elem.closest(".dsj-file-box-wrap").toggleAttr(
                        "data-selected",
                        "true",
                        "false"
                    );
                    if (!DSJ.uploader.data.multiple) {
                        elem.closest(".dsj-file-box-wrap")
                            .siblings()
                            .attr("data-selected", "false");
                    }
                    if (!DSJ.uploader.data.selectedFiles.includes(value)) {
                        if (!DSJ.uploader.data.multiple) {
                            DSJ.uploader.data.selectedFiles = [];
                            DSJ.uploader.data.selectedFilesObject = [];
                        }
                        DSJ.uploader.data.selectedFiles.push(value);
                        DSJ.uploader.data.selectedFilesObject.push(valueObject);
                    } else {
                        DSJ.uploader.data.selectedFiles = DSJ.uploader.data.selectedFiles.filter(
                            function (item) {
                                return item !== value;
                            }
                        );
                        DSJ.uploader.data.selectedFilesObject = DSJ.uploader.data.selectedFilesObject.filter(
                            function (item) {
                                return item !== valueObject;
                            }
                        );
                    }
                    DSJ.uploader.addSelectedValue();
                    DSJ.uploader.updateUploaderSelected();
                });
            });
        },
        updateFileHtml: function (array) {
            var fileText = "";
            if (array.length > 1) {
                var fileText = 'Files Selected';
            } else {
                var fileText = 'File Selected';
            }
            return array.length + " " + fileText;
        },
        updateUploaderSelected: function () {
            $(".dsj-uploader-selected").html(
                DSJ.uploader.updateFileHtml(DSJ.uploader.data.selectedFiles)
            );
        },
        clearUploaderSelected: function () {
            $(".dsj-uploader-selected-clear").on("click", function () {
                DSJ.uploader.data.selectedFiles = [];
                DSJ.uploader.addSelectedValue();
                DSJ.uploader.addHiddenValue();
                DSJ.uploader.resetFilter();
                DSJ.uploader.updateUploaderSelected();
                DSJ.uploader.updateUploaderFiles();
            });
        },
        resetFilter: function () {
            $('[name="dsj-uploader-search"]').val("");
            $('[name="dsj-show-selected"]').prop("checked", false);
            $('[name="dsj-uploader-sort"] option[value=newest]').prop(
                "selected",
                true
            );
        },
        getAllUploads: function (url, search_key = null, sort_key = null) {
            $(".dsj-uploader-all").html(
                '<div class="align-items-center d-flex h-100 justify-content-center w-100"><div class="spinner-border" role="status"></div></div>'
            );
            var params = {};
            if (search_key != null && search_key.length > 0) {
                params["search"] = search_key;
            }
            if (sort_key != null && sort_key.length > 0) {
                params["sort"] = sort_key;
            }
            else{
                params["sort"] = 'newest';
            }
            $.get(url, params, function (data, status) {
                //console.log(data);
                if(typeof data == 'string'){
                    data = JSON.parse(data);
                }
                DSJ.uploader.data.allFiles = data.data;
                DSJ.uploader.allowedFileType();
                DSJ.uploader.addSelectedValue();
                DSJ.uploader.addHiddenValue();
                //DSJ.uploader.resetFilter();
                DSJ.uploader.updateUploaderFiles();
                if (data.next_page_url != null) {
                    DSJ.uploader.data.next_page_url = data.next_page_url;
                    $("#uploader_next_btn").removeAttr("disabled");
                } else {
                    $("#uploader_next_btn").attr("disabled", true);
                }
                if (data.prev_page_url != null) {
                    DSJ.uploader.data.prev_page_url = data.prev_page_url;
                    $("#uploader_prev_btn").removeAttr("disabled");
                } else {
                    $("#uploader_prev_btn").attr("disabled", true);
                }
            });
        },
        showSelectedFiles: function () {
            $('[name="dsj-show-selected"]').on("change", function () {
                if ($(this).is(":checked")) {
                    // for (
                    //     var i = 0;
                    //     i < DSJ.uploader.data.allFiles.length;
                    //     i++
                    // ) {
                    //     if (DSJ.uploader.data.allFiles[i].selected) {
                    //         DSJ.uploader.data.allFiles[
                    //             i
                    //         ].aria_hidden = false;
                    //     } else {
                    //         DSJ.uploader.data.allFiles[
                    //             i
                    //         ].aria_hidden = true;
                    //     }
                    // }
                    DSJ.uploader.data.allFiles =
                        DSJ.uploader.data.selectedFilesObject;
                } else {
                    // for (
                    //     var i = 0;
                    //     i < DSJ.uploader.data.allFiles.length;
                    //     i++
                    // ) {
                    //     DSJ.uploader.data.allFiles[
                    //         i
                    //     ].aria_hidden = false;
                    // }
                    DSJ.uploader.getAllUploads(
                        DSJ.data.appUrl + "/dsj-uploader/get_uploaded_files"
                    );
                }
                DSJ.uploader.updateUploaderFiles();
            });
        },
        searchUploaderFiles: function () {
            $('[name="dsj-uploader-search"]').on("keyup", function () {
                var value = $(this).val();
                DSJ.uploader.getAllUploads(
                    DSJ.data.appUrl + "/dsj-uploader/get_uploaded_files",
                    value,
                    $('[name="dsj-uploader-sort"]').val()
                );
                // if (DSJ.uploader.data.allFiles.length > 0) {
                //     for (
                //         var i = 0;
                //         i < DSJ.uploader.data.allFiles.length;
                //         i++
                //     ) {
                //         if (
                //             DSJ.uploader.data.allFiles[
                //                 i
                //             ].file_original_name
                //                 .toUpperCase()
                //                 .indexOf(value) > -1
                //         ) {
                //             DSJ.uploader.data.allFiles[
                //                 i
                //             ].aria_hidden = false;
                //         } else {
                //             DSJ.uploader.data.allFiles[
                //                 i
                //             ].aria_hidden = true;
                //         }
                //     }
                // }
                //DSJ.uploader.updateUploaderFiles();
            });
        },
        sortUploaderFiles: function () {
            $('[name="dsj-uploader-sort"]').on("change", function () {
                var value = $(this).val();
                DSJ.uploader.getAllUploads(
                    DSJ.data.appUrl + "/dsj-uploader/get_uploaded_files",
                    $('[name="dsj-uploader-search"]').val(),
                    value
                );

                // if (value === "oldest") {
                //     DSJ.uploader.data.allFiles = DSJ.uploader.data.allFiles.sort(
                //         function(a, b) {
                //             return (
                //                 new Date(a.created_at) - new Date(b.created_at)
                //             );
                //         }
                //     );
                // } else if (value === "smallest") {
                //     DSJ.uploader.data.allFiles = DSJ.uploader.data.allFiles.sort(
                //         function(a, b) {
                //             return a.file_size - b.file_size;
                //         }
                //     );
                // } else if (value === "largest") {
                //     DSJ.uploader.data.allFiles = DSJ.uploader.data.allFiles.sort(
                //         function(a, b) {
                //             return b.file_size - a.file_size;
                //         }
                //     );
                // } else {
                //     DSJ.uploader.data.allFiles = DSJ.uploader.data.allFiles.sort(
                //         function(a, b) {
                //             a = new Date(a.created_at);
                //             b = new Date(b.created_at);
                //             return a > b ? -1 : a < b ? 1 : 0;
                //         }
                //     );
                // }
                //DSJ.uploader.updateUploaderFiles();
            });
        },
        addSelectedValue: function () {
            for (var i = 0; i < DSJ.uploader.data.allFiles.length; i++) {
                if (
                    !DSJ.uploader.data.selectedFiles.includes(
                        DSJ.uploader.data.allFiles[i].id
                    )
                ) {
                    DSJ.uploader.data.allFiles[i].selected = false;
                } else {
                    DSJ.uploader.data.allFiles[i].selected = true;
                }
            }
        },
        addHiddenValue: function () {
            for (var i = 0; i < DSJ.uploader.data.allFiles.length; i++) {
                DSJ.uploader.data.allFiles[i].aria_hidden = false;
            }
        },
        allowedFileType: function () {
            if (DSJ.uploader.data.type !== "all") {
                DSJ.uploader.data.allFiles = DSJ.uploader.data.allFiles.filter(
                    function (item) {
                        return item.type === DSJ.uploader.data.type;
                    }
                );
            }
        },
        updateUploaderFiles: function () {
            $(".dsj-uploader-all").html(
                '<div class="align-items-center d-flex h-100 justify-content-center w-100"><div class="spinner-border" role="status"></div></div>'
            );

            var data = DSJ.uploader.data.allFiles;

            setTimeout(function () {
                $(".dsj-uploader-all").html(null);

                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        var thumb = "";
                        var hidden = "";
                        if (data[i].type === "image") {
                            thumb =
                                '<img src="' +
                                DSJ.data.fileBaseUrl +
                                data[i].file_name +
                                '" class="img-fit">';
                        } else {
                            thumb = '<i class="la la-file-text"></i>';
                        }
                        var html =
                            '<div class="dsj-file-box-wrap" aria-hidden="' +
                            data[i].aria_hidden +
                            '" data-selected="' +
                            data[i].selected +
                            '">' +
                            '<div class="dsj-file-box">' +
                            // '<div class="dropdown-file">' +
                            // '<a class="dropdown-link" data-toggle="dropdown">' +
                            // '<i class="la la-ellipsis-v"></i>' +
                            // "</a>" +
                            // '<div class="dropdown-menu dropdown-menu-right">' +
                            // '<a href="' +
                            // DSJ.data.fileBaseUrl +
                            // data[i].file_name +
                            // '" target="_blank" download="' +
                            // data[i].file_original_name +
                            // "." +
                            // data[i].extension +
                            // '" class="dropdown-item"><i class="la la-download mr-2"></i>Download</a>' +
                            // '<a href="#" class="dropdown-item dsj-uploader-delete" data-id="' +
                            // data[i].id +
                            // '"><i class="la la-trash mr-2"></i>Delete</a>' +
                            // "</div>" +
                            // "</div>" +
                            '<div class="card card-file dsj-uploader-select" title="' +
                            data[i].file_original_name +
                            "." +
                            data[i].extension +
                            '" data-value="' +
                            data[i].id +
                            '">' +
                            '<div class="card-file-thumb">' +
                            thumb +
                            "</div>" +
                            '<div class="card-body">' +
                            '<h6 class="d-flex">' +
                            '<span class="text-truncate title">' +
                            data[i].file_original_name +
                            "</span>" +
                            '<span class="ext flex-shrink-0">.' +
                            data[i].extension +
                            "</span>" +
                            "</h6>" +
                            "<p>" +
                            DSJ.extra.bytesToSize(data[i].file_size) +
                            "</p>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>";

                        $(".dsj-uploader-all").append(html);
                    }
                } else {
                    $(".dsj-uploader-all").html(
                        '<div class="align-items-center d-flex h-100 justify-content-center w-100 nav-tabs"><div class="text-center"><h3>No files found</h3></div></div>'
                    );
                }
                DSJ.uploader.uploadSelect();
                DSJ.uploader.deleteUploaderFile();
            }, 300);
        },
        inputSelectPreviewGenerate: function (elem) {
            elem.find(".selected-files").val(DSJ.uploader.data.selectedFiles);
            elem.next(".file-preview").html(null);

            if (DSJ.uploader.data.selectedFiles.length > 0) {

                $.post(
                    DSJ.data.appUrl + "/dsj-uploader/get_file_by_ids",
                    { _token: DSJ.data.csrf, ids: DSJ.uploader.data.selectedFiles.toString() },
                    function (data) {

                        elem.next(".file-preview").html(null);

                        if (data.length > 0) {
                            elem.find(".file-amount").html(
                                DSJ.uploader.updateFileHtml(data)
                            );
                            for (
                                var i = 0;
                                i < data.length;
                                i++
                            ) {
                                var thumb = "";
                                if (data[i].type === "image") {
                                    thumb =
                                        '<img src="' +
                                        DSJ.data.fileBaseUrl +
                                        data[i].file_name +
                                        '" class="img-fit">';
                                } else {
                                    thumb = '<i class="la la-file-text"></i>';
                                }
                                var html =
                                    '<div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="' +
                                    data[i].id +
                                    '" title="' +
                                    data[i].file_original_name +
                                    "." +
                                    data[i].extension +
                                    '">' +
                                    '<div class="align-items-center align-self-stretch d-flex justify-content-center thumb">' +
                                    thumb +
                                    "</div>" +
                                    '<div class="col body">' +
                                    '<h6 class="d-flex">' +
                                    '<span class="text-truncate title">' +
                                    data[i].file_original_name +
                                    "</span>" +
                                    '<span class="flex-shrink-0 ext">.' +
                                    data[i].extension +
                                    "</span>" +
                                    "</h6>" +
                                    "<p>" +
                                    DSJ.extra.bytesToSize(
                                        data[i].file_size
                                    ) +
                                    "</p>" +
                                    "</div>" +
                                    '<div class="remove">' +
                                    '<button class="btn btn-sm btn-link remove-attachment" type="button">' +
                                    '<i class="la la-close"></i>' +
                                    "</button>" +
                                    "</div>" +
                                    "</div>";

                                elem.next(".file-preview").append(html);
                            }
                        } else {
                            elem.find(".file-amount").html('Choose File');
                        }
                });
            } else {
                elem.find(".file-amount").html('Choose File');
            }

            // if (DSJ.uploader.data.selectedFiles.length > 0) {
            //     elem.find(".file-amount").html(
            //         DSJ.uploader.updateFileHtml(DSJ.uploader.data.selectedFiles)
            //     );
            //     for (
            //         var i = 0;
            //         i < DSJ.uploader.data.selectedFiles.length;
            //         i++
            //     ) {
            //         var index = DSJ.uploader.data.allFiles.findIndex(
            //             (x) => x.id === DSJ.uploader.data.selectedFiles[i]
            //         );
            //         var thumb = "";
            //         if (DSJ.uploader.data.allFiles[index].type == "image") {
            //             thumb =
            //                 '<img src="' +
            //                 DSJ.data.appUrl +
            //                 "/public/" +
            //                 DSJ.uploader.data.allFiles[index].file_name +
            //                 '" class="img-fit">';
            //         } else {
            //             thumb = '<i class="la la-file-text"></i>';
            //         }
            //         var html =
            //             '<div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="' +
            //             DSJ.uploader.data.allFiles[index].id +
            //             '" title="' +
            //             DSJ.uploader.data.allFiles[index].file_original_name +
            //             "." +
            //             DSJ.uploader.data.allFiles[index].extension +
            //             '">' +
            //             '<div class="align-items-center align-self-stretch d-flex justify-content-center thumb">' +
            //             thumb +
            //             "</div>" +
            //             '<div class="col body">' +
            //             '<h6 class="d-flex">' +
            //             '<span class="text-truncate title">' +
            //             DSJ.uploader.data.allFiles[index].file_original_name +
            //             "</span>" +
            //             '<span class="ext">.' +
            //             DSJ.uploader.data.allFiles[index].extension +
            //             "</span>" +
            //             "</h6>" +
            //             "<p>" +
            //             DSJ.extra.bytesToSize(
            //                 DSJ.uploader.data.allFiles[index].file_size
            //             ) +
            //             "</p>" +
            //             "</div>" +
            //             '<div class="remove">' +
            //             '<button class="btn btn-sm btn-link remove-attachment" type="button">' +
            //             '<i class="la la-close"></i>' +
            //             "</button>" +
            //             "</div>" +
            //             "</div>";

            //         elem.next(".file-preview").append(html);
            //     }
            // } else {
            //     elem.find(".file-amount").html("Choose File");
            // }
        },
        editorImageGenerate: function (elem) {
            if (DSJ.uploader.data.selectedFiles.length > 0) {
                for (
                    var i = 0;
                    i < DSJ.uploader.data.selectedFiles.length;
                    i++
                ) {
                    var index = DSJ.uploader.data.allFiles.findIndex(
                        (x) => x.id === DSJ.uploader.data.selectedFiles[i]
                    );
                    var thumb = "";
                    if (DSJ.uploader.data.allFiles[index].type === "image") {
                        thumb =
                            '<img src="' +
                            DSJ.data.fileBaseUrl +
                            DSJ.uploader.data.allFiles[index].file_name +
                            '">';
                        elem[0].insertHTML(thumb);
                        // console.log(elem);
                    }
                }
            }
        },
        dismissUploader: function () {
            $("#dsjUploaderModal").on("hidden.bs.modal", function () {
                $(".dsj-uploader-backdrop").remove();
                $("#dsjUploaderModal").remove();
            });
        },
        trigger: function (
            elem = null,
            from = "",
            type = "all",
            selectd = "",
            multiple = false,
            callback = null
        ) {
            // $("body").append('<div class="dsj-uploader-backdrop"></div>');

            var elem = $(elem);
            var multiple = multiple;
            var type = type;
            var oldSelectedFiles = selectd;
            if (oldSelectedFiles !== "") {
                DSJ.uploader.data.selectedFiles = oldSelectedFiles
                    .split(",")
                    .map(Number);
            } else {
                DSJ.uploader.data.selectedFiles = [];
            }
            if ("undefined" !== typeof type && type.length > 0) {
                DSJ.uploader.data.type = type;
            }

            if (multiple) {
                DSJ.uploader.data.multiple = true;
            }else{
                DSJ.uploader.data.multiple = false;
            }

            // setTimeout(function() {
            $.post(
                DSJ.data.appUrl + "/dsj-uploader",
                { _token: DSJ.data.csrf },
                function (data) {
                    $("body").append(data);
                    $("#dsjUploaderModal").modal("show");
                    DSJ.plugins.dsUppy();
                    DSJ.uploader.getAllUploads(
                        DSJ.data.appUrl + "/dsj-uploader/get_uploaded_files",
                        null,
                        $('[name="dsj-uploader-sort"]').val()
                    );
                    DSJ.uploader.updateUploaderSelected();
                    DSJ.uploader.clearUploaderSelected();
                    DSJ.uploader.sortUploaderFiles();
                    DSJ.uploader.searchUploaderFiles();
                    DSJ.uploader.showSelectedFiles();
                    DSJ.uploader.dismissUploader();

                    $("#uploader_next_btn").on("click", function () {
                        if (DSJ.uploader.data.next_page_url != null) {
                            $('[name="dsj-show-selected"]').prop(
                                "checked",
                                false
                            );
                            DSJ.uploader.getAllUploads(
                                DSJ.uploader.data.next_page_url
                            );
                        }
                    });

                    $("#uploader_prev_btn").on("click", function () {
                        if (DSJ.uploader.data.prev_page_url != null) {
                            $('[name="dsj-show-selected"]').prop(
                                "checked",
                                false
                            );
                            DSJ.uploader.getAllUploads(
                                DSJ.uploader.data.prev_page_url
                            );
                        }
                    });

                    $(".dsj-uploader-search i").on("click", function () {
                        $(this).parent().toggleClass("open");
                    });

                    $('[data-toggle="dsjUploaderAddSelected"]').on(
                        "click",
                        function () {
                            if (from === "input") {
                                DSJ.uploader.inputSelectPreviewGenerate(elem);
                            } else if (from === "direct") {
                                callback(DSJ.uploader.data.selectedFiles);
                            }
                            $("#dsjUploaderModal").modal("hide");
                        }
                    );
                }
            );
            // }, 50);
        },
        initForInput: function () {
            $(document).on("click",'[data-toggle="dsjuploader"]', function (e) {
                if (e.detail === 1) {
                    var elem = $(this);
                    var multiple = elem.data("multiple");
                    var type = elem.data("type");
                    var oldSelectedFiles = elem.find(".selected-files").val();

                    multiple = !multiple ? "" : multiple;
                    type = !type ? "" : type;
                    oldSelectedFiles = !oldSelectedFiles
                        ? ""
                        : oldSelectedFiles;

                    DSJ.uploader.trigger(
                        this,
                        "input",
                        type,
                        oldSelectedFiles,
                        multiple
                    );
                }
            });
        },
        previewGenerate: function(){
            $('[data-toggle="dsjuploader"]').each(function () {
                var $this = $(this);
                var files = $this.find(".selected-files").val();
                if(files != ""){
                    $.post(
                        DSJ.data.appUrl + "/dsj-uploader/get_file_by_ids",
                        { _token: DSJ.data.csrf, ids: files },
                        function (data) {

                            $this.next(".file-preview").html(null);

                            if (data.length > 0) {
                                $this.find(".file-amount").html(
                                    DSJ.uploader.updateFileHtml(data)
                                );
                                for (
                                    var i = 0;
                                    i < data.length;
                                    i++
                                ) {
                                    var thumb = "";
                                    if (data[i].type === "image") {
                                        thumb =
                                            '<img src="' +
                                            DSJ.data.fileBaseUrl +
                                            data[i].file_name +
                                            '" class="img-fit">';
                                    } else {
                                        thumb = '<i class="la la-file-text"></i>';
                                    }
                                    var html =
                                        '<div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="' +
                                        data[i].id +
                                        '" title="' +
                                        data[i].file_original_name +
                                        "." +
                                        data[i].extension +
                                        '">' +
                                        '<div class="align-items-center align-self-stretch d-flex justify-content-center thumb">' +
                                        thumb +
                                        "</div>" +
                                        '<div class="col body">' +
                                        '<h6 class="d-flex">' +
                                        '<span class="text-truncate title">' +
                                        data[i].file_original_name +
                                        "</span>" +
                                        '<span class="ext flex-shrink-0">.' +
                                        data[i].extension +
                                        "</span>" +
                                        "</h6>" +
                                        "<p>" +
                                        DSJ.extra.bytesToSize(
                                            data[i].file_size
                                        ) +
                                        "</p>" +
                                        "</div>" +
                                        '<div class="remove">' +
                                        '<button class="btn btn-sm btn-link remove-attachment" type="button">' +
                                        '<i class="la la-close"></i>' +
                                        "</button>" +
                                        "</div>" +
                                        "</div>";

                                    $this.next(".file-preview").append(html);
                                }
                            } else {
                                $this.find(".file-amount").html('Choose File');
                            }
                    });
                }
            });
        }
    };
    DSJ.extra = {
        bytesToSize: function (bytes) {
            var sizes = ["Bytes", "KB", "MB", "GB", "TB"];
            if (bytes == 0) return "0 Byte";
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + " " + sizes[i];
        }
    };
    DSJ.plugins = {
        dsUppy: function () {
            if ($("#dsj-upload-files").length > 0) {
                var uppy = new Uppy.Core({
                    autoProceed: true,
                });
                uppy.use(Uppy.Dashboard, {
                    target: "#dsj-upload-files",
                    inline: true,
                    showLinkToFileUploadResult: false,
                    showProgressDetails: true,
                    hideCancelButton: true,
                    hidePauseResumeButton: true,
                    hideUploadButton: true,
                    proudlyDisplayPoweredByUppy: false,
                    locale: {
                        strings: {
                            addMoreFiles: 'ADD MORE FILES',
                            addingMoreFiles: 'ADDINF MORE FILES',
                            dropPaste: 'DROP FILE HERE, PAST OR '+' %{browse}',
                            browse: 'BROWSE',
                            uploadComplete: 'UPLOAD COMPLETE',
                            uploadPaused: 'UPLOAD PAUSE',
                            resumeUpload: 'RESUME UPLOAD',
                            pauseUpload: 'PAUSE UPLOAD',
                            retryUpload: 'RETRY UPLOAD',
                            cancelUpload: 'CANCEL UPLOAD',
                            xFilesSelected: {
                                0: '%{smart_count} '+ 'FILE SELECTED',
                                1: '%{smart_count} '+ 'FILES SELECTED'
                            },
                            uploadingXFiles: {
                                0: 'UPLOADING'+' %{smart_count} '+'FILE',
                                1: 'UPLOADING'+' %{smart_count} '+'FILES'
                            },
                            processingXFiles: {
                                0: 'PROCESSING'+' %{smart_count} '+'FILE',
                                1: 'PROCESSING'+' %{smart_count} '+'FILES'
                            },
                            uploading: 'UPLOADING',
                            complete: 'COMPLETE',
                        }
                    }
                });
                uppy.use(Uppy.XHRUpload, {
                    endpoint: DSJ.data.appUrl + "/dsj-uploader/upload",
                    fieldName: "dsj_file",
                    formData: true,
                    headers: {
                        'X-CSRF-TOKEN': DSJ.data.csrf,
                    },
                });
                uppy.on("upload-success", function () {
                    DSJ.uploader.getAllUploads(
                        DSJ.data.appUrl + "/dsj-uploader/get_uploaded_files"
                    );
                });
            }
        },
        notify: function (type = "dark", message = "") {
            $.notify(
                {
                    // options
                    message: message,
                },
                {
                    // settings
                    showProgressbar: true,
                    delay: 2500,
                    mouse_over: "pause",
                    placement: {
                        from: "bottom",
                        align: "left",
                    },
                    animate: {
                        enter: "animated fadeInUp",
                        exit: "animated fadeOutDown",
                    },
                    type: type,
                    template:
                        '<div data-notify="container" class="dsj-notify alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" data-notify="dismiss" class="close"><i class="las la-times"></i></button>' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        "</div>" +
                        "</div>",
                }
            );
        }
    }

    setInterval(function(){
        DSJ.extra.refreshToken();
    }, 3600000);

    DSJ.uploader.initForInput();
    DSJ.uploader.removeAttachment();
    DSJ.uploader.previewGenerate();
})(jQuery);