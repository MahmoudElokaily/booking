<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield("title")</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="shortcut icon" href="https://img.merchantface.com/site/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/viewer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-msg.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/site.css')}}">

    <script src="{{asset('assets/js/jquery-1.11.3.min.js.download')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js.download')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.js.download')}}"></script>
    <script src="{{asset('assets/js/theme.js.download')}}"></script>
    <script src="{{asset('assets/js/viewer-jquery.min.js.download')}}"></script>
    <script src="{{asset('assets/js/bootstrap-msg.js.download')}}"></script>

    <script src="{{asset('assets/js/bootbox.min.js.download')}}"></script>
    <style type="text/css">
        body,
        body.swal2-shown,
        body.modal-open {
            overflow: inherit;
            padding-right: inherit !important;
        }
    </style>

</head>

<body id="page-body" style="padding: 0px !important; overflow-y: scroll !important;">

<div id="wrapper" class="container-md p-0">
    <div id="wrapper" class="container-md p-0">
        @include('inc.left-nav')
        <div class="d-flex flex-column flex-grow-1">
            <div id="content">
                @include("inc.top-nav")
                <main role="main" class="container-fluid bg-white p-0">
                    <style type="text/css">
                        .post-svg svg,
                        .post-svg i {
                            width: 18px;
                            height: 18px;
                            fill: #4e73df;
                            color: #4e73df;
                            cursor: pointer;
                            margin-left: 3px;
                        }

                        .body-svg svg {
                            width: 15px;
                            height: 15px;
                            fill: rgb(139, 128, 128);
                        }

                        .replay-g svg {
                            fill: rgb(104, 113, 231);
                        }

                        .replay-g span {
                            color: #4e73df;
                            font-weight: 600px;
                            font-size: 0.8rem;
                            margin-top: 2px;
                            margin-left: 3px;
                        }

                        .b-hang:hover {
                            background-color: #e4e6ec;
                            cursor: pointer;
                        }

                        .b-hang {
                            display: none
                        }

                        .f-icoktb {
                            opacity: 0.5;
                            font-weight: 400;
                        }

                        .post-text-a {
                            color: rgb(20, 10, 10);
                            font-size: 12px;
                            padding-top: 4px;
                        }

                        #post-text-b {
                            min-height: 130px;
                        }

                        #allow-text-length {
                            font-weight: 300;
                        }

                        .form-control.input-text-simple {
                            font-size: 1rem
                        }

                        .replay-option {
                            line-height: 1.5rem;
                        }

                        .replay-option:hover {
                            background-color: #e4e6ec;
                            cursor: pointer;
                        }

                        #post-imgs {
                            width: 100%;
                            margin: 0 auto;
                            display: flex;
                            flex-direction: row;
                        }

                        .post-imgs-c {
                            display: flex;
                            flex-direction: column;
                            height: 100%;
                            width: 100%;
                        }

                        .img-item-content {
                            margin: 3px;
                            flex-grow: 5;
                            height: 100%;
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center center;
                            width: 100%;
                            position: relative;
                        }

                        .css-img-p {
                            inset: 0px;
                            height: 100%;
                            opacity: 0;
                            position: absolute;
                            width: 100%;
                            z-index: -1;
                        }

                        .edit-img {
                            right: 4px;
                            bottom: 4px;
                            min-width: 24px;
                            min-height: 24px;
                            position: absolute;
                            border-radius: 999px;
                            border-width: 2px;
                            border-color: #fff;
                            background-color: #4e73df;
                        }

                        .remove-img {
                            top: 4px;
                            left: 4px;
                            min-width: 24px;
                            min-height: 24px;
                            position: absolute;
                            border-radius: 999px;
                            border-width: 2px;
                            border-color: #fff;
                            background-color: #4e73df;
                        }

                        .remove-img-s svg,
                        .edit-img-s svg {
                            width: 24px;
                            height: 24px;
                            fill: #e4e6ec;
                        }
                    </style>
                        @section("content")


                        @show
                    @include("inc.footer")
                </main>
            </div>
        </div>
    </div>
</div>

</body>

</html>
