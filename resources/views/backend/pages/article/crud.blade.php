@extends('backend.layouts.index')


@push('styles')
    <!--plugins-->

    <link href="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <link href="{{ asset('backend') }}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datetime/jquery.datetimepicker.min.css') }}">
    <style>
        .one-set{
            background: #cdeeee;
            margin-bottom: 10px;
            padding: 10px 15px;
            border-radius: 7px;
        }
    </style>

@endpush

@push('scripts')
    <!--plugins-->
    <script src="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="{{ asset('backend') }}/assets/plugins/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend/assets/plugins/datetime/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/xbw872gf05l003xyag73l4fuxlcse5ggqre8dxhqd72fmil6/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.PluginManager.add('readmore', function(editor, url) {
            var addHtml = function() {
                editor.insertContent(`<div class="also-read"><p class="also-read-intro">Also Read: </p>
                    <div class="articles row">
                        </div>
                        </div>`
                );
            };
            /* Add a button that opens a window */
            editor.ui.registry.addButton('readmore', {
                text: 'Add Read More',
                class: "btn btn-primary",
                onAction: function() {
                    /* Open window */
                    addHtml();
                }
            });
            /* Adds a menu item, which can then be included in any menu via the menu/menubar configuration */
            editor.ui.registry.addMenuItem('readmore', {
                text: 'Read More plugin',
                onAction: function() {
                    /* Open window */
                    addHtml();
                }
            });
            /* Return the metadata for the help plugin */
            return {
                getMetadata: function() {
                    return {
                        name: 'ReadMore plugin',
                        url: "{{ url('') }}"
                    };
                }
            };
        });
        // Dialog for readmore article insertion

        const dialogConfig =  {
                    title: 'Select Read More Articles',
                    body: {
                        type: 'panel',
                        items: [
                            {
                                type: 'input',
                                name: 'article_url',
                                label: 'Input the url',
                            },
                            {
                                type: 'input',
                                name: 'article_title',
                                label: 'Input the title to display'
                            },
                            {
                                type: 'input',
                                name: 'article_image',
                                label: 'Input image url',
                            }
                        ]
                    },
                    buttons: [
                        {
                            type: 'cancel',
                            name: 'closeButton',
                            text: 'Cancel'
                        },
                        {
                            type: 'submit',
                            name: 'submitButton',
                            text: 'Insert',
                            buttonType: 'primary'
                        }
                    ],
                    onSubmit: (api) => {
                        const data = api.getData();

                        tinymce.activeEditor.execCommand('mceInsertContent', false, `
                            <div class="col-md-6 col-12">
                                <div class="also-read-article">
                                    <img src="${data.article_image}" class="also-read-image" />
                                    <a class="also-read-title" href="${data.article_url}">${data.article_title}</a>
                                </div>
                            </div>
                            `);
                        api.close();
                    }
                    };

        // End


        const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/backend/article/upload-content-image');

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({
                        message: 'HTTP Error: ' + xhr.status,
                        remove: true
                    });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                resolve(json.location);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob());
            xhr.send(formData);
        });



        tinymce.init({
            selector: 'textarea.editor',

            plugins: 'readmore preview advlist link importcss searchreplace autosave save directionality code visualblocks visualchars fullscreen image media template codesample table charmap pagebreak nonbreaking anchor insertdatetime lists wordcount help charmap emoticons',

            imagetools_cors_hosts: ['picsum.photos'],
            image_caption: true,


            relative_urls: false,
            convert_urls: false,
            menubar: '',

            toolbar: 'blocks code bold italic underline insertfile image media link blockquote alignleft aligncenter alignjustify save numlist bullist charmap fullscreen table preview readmore dialog-example-btn',

            link_context_toolbar: true,
            link_rel_list:[
                {
                    title: 'Follow',
                    value: ''
                },
                {
                    title: 'No Follow',
                    value: 'nofollow'
                },
                {
                    title: 'Sponsored',
                    value: 'sponsored'
                },
                {
                    title: 'Combined',
                    value: 'nofollow sponsored'
                }
            ],

            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "5s",
            autosave_prefix: "{{ route('backend.article-update', $article->id) }}",
            autosave_restore_when_empty: false,
            autosave_retention: "5s",

            setup: (editor) => {
                editor.ui.registry.addButton('dialog-example-btn', {
                icon: "edit-image",
                onAction: () => editor.windowManager.open(dialogConfig)
                })
            },

            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            images_upload_handler: image_upload_handler_callback,


            // file_picker_types: 'image',
            /* and here's our custom image picker*/


            // success color
            content_style: `body { font-family:Helvetica,Arial,sans-serif; font-size:16px; width: 95%; } .readmore{ border: solid 1px #ccc;background-color: #eee; font-size: 17px; font-weight:bold; border-radius:7px; width:35%; color:black; padding: 5px 10px; margin: 10px 0; }

            .also-read{ margin: 10px; border: 1px solid #ccc; border-radius: 10px; background-color: rgb(209, 239, 255); } .articles{ padding: 0px 20px 10px 5px; margin-left: 10px; display:flex; flex-direction: row;} .also-read-article{ display: flex; flex-direction: row; gap: 10px; } .col-md-6{width:50%;} .also-read-article .also-read-image{ width: 100px; height: 90px; } .also-read-intro{ padding: 10px 15px 0px 15px; font-size: 20px; font-weight: 600; color: #dd3000; } .also-read-title{ margin:0px; padding: 0px; display: -webkit-box; -webkit-line-clamp: 3; overflow: hidden; -webkit-box-orient: vertical }
            `,


            importcss_append: true,

            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 700,
            image_caption: true,
            quickbars_selection_toolbar: '',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "table",

        });
    </script>
@endpush


@section('content')
    @include('backend.pages.article.forms._form')
@endsection
