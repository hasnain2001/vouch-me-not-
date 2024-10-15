<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2024 08:07:49 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') |VouchMeNot</title>
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

    <link href="{{ asset('css/summernote-bs4.min.css') }}" rel="stylesheet">

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min2167.css?v=3.2.0') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    
      <style>
            .sidebar-dark-primary {
            background-color: rgb(65, 163, 35) !important;
            
        }
           
        .navbar-username {
    font-size: 2.40rem; /* Adjust the size as needed */
}
.nav-link {
    color: black;
}

.nav-link .nav-icon,
.nav-link p,
.nav-link .right {
    color: black;
}

  
    </style>
    <script nonce="f1447a86-ce2c-40e9-9e09-d88357b3081d">
        // try {
        //     (function(w, d) {
        //         ! function(bu, bv, bw, bx) {
        //             bu[bw] = bu[bw] || {};
        //             bu[bw].executed = [];
        //             bu.zaraz = {
        //                 deferred: [],
        //                 listeners: []
        //             };
        //             bu.zaraz.q = [];
        //             bu.zaraz._f = function(by) {
        //                 return async function() {
        //                     var bz = Array.prototype.slice.call(arguments);
        //                     bu.zaraz.q.push({
        //                         m: by,
        //                         a: bz
        //                     })
        //                 }
        //             };
        //             for (const bA of ["track", "set", "debug"]) bu.zaraz[bA] = bu.zaraz._f(bA);
        //             bu.zaraz.init = () => {
        //                 var bB = bv.getElementsByTagName(bx)[0],
        //                     bC = bv.createElement(bx),
        //                     bD = bv.getElementsByTagName("title")[0];
        //                 bD && (bu[bw].t = bv.getElementsByTagName("title")[0].text);
        //                 bu[bw].x = Math.random();
        //                 bu[bw].w = bu.screen.width;
        //                 bu[bw].h = bu.screen.height;
        //                 bu[bw].j = bu.innerHeight;
        //                 bu[bw].e = bu.innerWidth;
        //                 bu[bw].l = bu.location.href;
        //                 bu[bw].r = bv.referrer;
        //                 bu[bw].k = bu.screen.colorDepth;
        //                 bu[bw].n = bv.characterSet;
        //                 bu[bw].o = (new Date).getTimezoneOffset();
        //                 if (bu.dataLayer)
        //                     for (const bH of Object.entries(Object.entries(dataLayer).reduce(((bI, bJ) => ({
        //                             ...bI[1],
        //                             ...bJ[1]
        //                         })), {}))) zaraz.set(bH[0], bH[1], {
        //                         scope: "page"
        //                     });
        //                 bu[bw].q = [];
        //                 for (; bu.zaraz.q.length;) {
        //                     const bK = bu.zaraz.q.shift();
        //                     bu[bw].q.push(bK)
        //                 }
        //                 bC.defer = !0;
        //                 for (const bL of [localStorage, sessionStorage]) Object.keys(bL || {}).filter((bN => bN
        //                     .startsWith("_zaraz_"))).forEach((bM => {
        //                     try {
        //                         bu[bw]["z_" + bM.slice(7)] = JSON.parse(bL.getItem(bM))
        //                     } catch {
        //                         bu[bw]["z_" + bM.slice(7)] = bL.getItem(bM)
        //                     }
        //                 }));
        //                 bC.referrerPolicy = "origin";
        //                 bC.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bu[
        //                     bw])));
        //                 bB.parentNode.insertBefore(bC, bB)
        //             };
        //             ["complete", "interactive"].includes(bv.readyState) ? zaraz.init() : bu.addEventListener(
        //                 "DOMContentLoaded", zaraz.init)
        //         }(w, d, "zarazData", "script");
        //     })(window, document)
        // } catch (e) {
        //     throw fetch("/cdn-cgi/zaraz/t"), e;
        // };
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-primary"></i></a>
    </li>
  </ul>


  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      @if (Auth::check())
        <a class="nav-link navbar-username dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle text-success"></i>
          <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Profile</span>
          <div class="dropdown-divider"></div>
          <a href="profile" class="dropdown-item">
            <i class="fas fa-user mr-2 text-primary"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('employe.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      @else
        <a class="nav-link" href="{{ route('login') }}">
          <i class="far fa-user-circle"></i>
          Guest
        </a>
      @endif
    </li>
  </ul>
</nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a  href="{{ route('employe.dashboard') }}" class="brand-link">
                <img src="{{ asset('images/icons.png') }}" alt=""
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">vouchmenot
                    
                </span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('employe.dashboard') }}" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Setup Manager
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.category') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.store') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.coupon') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Coupons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.network') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Network</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blog</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>

            </div>

        </aside>
        {{-- Main Content Here --}}
            @yield('main-content')
        {{-- Main Content Here --}}

        
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote(
             {height:400,
            }
        ); // Replace '#summernote' with the ID of your textarea
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
<!--
    Uncomment to load the Spanish translation
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/translations/es.js"></script>
-->
<script>
    // This sample still does not showcase all CKEditor&nbsp;5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "superbuild" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'AIAssistant',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'MultiLevelList',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced',
            'CaseChange'
        ]
    });
</script>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>


    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>

    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('admin/dist/js/adminlte2167.js?v=3.2.0') }}"></script>

    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>

    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
</body>


</html>
