<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Sportzsaga | Siscaa carrom board | Admin Panel</title>
    <!-- Site favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>images/driphunter-favicon.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>images/driphunter-favicon.png" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/switchery/switchery.min.css" />
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/loader.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/custom-loader.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/loader.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/jquery-steps/jquery.steps.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/drop-zone-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Quill.js CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Include SortableJS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    <!-- Unicons CDN Link for Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>
<style>
    .blogs-imex {
        display: flex;
        justify-content: end;
    }

    .blogs-imex a {
        margin: 0 5px;
    }

    #main-content-container {
        width: 100%;
        margin: 20px 0;
    }

    .ck-editor__editable[role="textbox"] {
        /* Editing area */
        min-height: 200px;
    }

    .ck-content .image {
        /* Block images */
        max-width: 80%;
        margin: 20px auto;
    }

    .image-preview {
        display: none;
        margin: 25px;
        height: auto;
    }

    #dripspot-image-preview {
        display: none;
        margin: 25px 0 0 0;
        border: 1px dotted black;
    }

    #dripspot-pc-image-preview {
        margin: 25px 0 0 0;
        border: 1px dotted black;
    }



    #logo-image-preview {
        display: none;
        margin: 35px;
        width: 300px;
        height: auto;
        border: 1px dotted black;
    }

    .hidden {
        display: none;
    }

    .metafeilds {
        margin: 12px 0;
    }

    .storymainshow {
        width: 100%;
        margin: 50px 0;
        height: 600px;
        background-color: red;
    }

    .alert-bottom-right {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        display: none;
    }

    .blog-live-icon {
        display: inline-block;
        position: relative;
        top: calc(50% - 5px);
        background-color: red;
        width: 10px;
        height: 10px;
        margin-left: 20px;
        border: 1px solid rgba(black, 0.1);
        border-radius: 50%;
        z-index: 1;

        &:before {
            content: "";
            display: block;
            position: absolute;
            background-color: rgba(red, 0.6);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            animation: live 2s ease-in-out infinite;
            z-index: -1;
        }
    }

    .eyeicon {
        font-size: 20px;
        color: blueviolet;
    }

    .truncate-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .secvisible {
        font-size: 18px;
    }

    .socialmedit a {
        text-decoration: none;
        color: white !important;
    }

    .card-box-products {
        margin-top: 18px !important;
    }



    .cdtitle {
        margin: 8px 0;
    }

    .modal-dialog.modal-xl {
        max-width: 100%;
        margin: auto 450px;
    }

    .weight-input {
        margin-left: 14px !important;
    }

    .weight-unit {
        margin-left: 14px !important;
    }

    .quill-editor {
        height: 150px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }
</style>