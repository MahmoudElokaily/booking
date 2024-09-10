<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="shortcut icon" href="https://img.merchantface.com/site/favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/viewer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-msg.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/viewer-jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-msg.js') }}"></script>

    <script src="{{ asset('assets/js/bootbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <style type="text/css">
        body,
        body.swal2-shown,
        body.modal-open {
            overflow: inherit;
            padding-right: inherit !important;
        }
    </style>
    <style type="text/css">
        .info-img-box {
            width: 100%;
            margin: 0 auto;
            height: 300px;
            max-height: 300px;
            display: flex;
            flex-direction: row;
        }

        .info-img-box-c {
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
        }

        .info-img-content {
            margin: 1px;
            flex-grow: 5;
            height: 100%;
            width: 99%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;
        }

        .list-group-item {
            padding: 0 !important
        }

        .menu-icon:hover {
            background-color: #d5ddf3 !important;
        }
    </style>


</head>

<body id="page-body" style="padding: 0px !important; overflow-y: scroll !important;">


    <!-- Button trigger modal -->
    <button type="button" id="btnPurchaseClose" style="display: none;" class="btn btn-primary" data-toggle="modal"
        data-target="#imgshowModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="imgshowModal" tabindex="-1" role="dialog" aria-labelledby="imgshowModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" style="margin-left: 90%;" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body">
                    <img class="modal-content" id="img01">
                </div>
                {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
            </div>
        </div>
    </div>




    <div id="wrapper" class="container-md p-0">
        <div id="wrapper" class="container-md p-0">
            @include('inc.left-nav')
            <div class="d-flex flex-column flex-grow-1">
                <div id="content">
                    @include('inc.top-nav')
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
                        @section('content')


                        @show
                        @include('inc.footer')
                    </main>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img id="modalImage" src="" class="img-fluid w-100" alt="Full Screen Image">
                </div>
                <button type="button" class="close position-absolute" style="top: 10px; right: 20px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript">

        $("#search-button").click(function() {


            var search = $(".search-value").val();

            if(search!="" )
            {
            // Construct the URL with the search query
            var url = '/posts-search/' + encodeURIComponent(search);

            // Navigate to the constructed URL
            window.location.href = url;
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".post-image").click(function() {

                $('#btnPurchaseClose').trigger('click');
                //  $('#imgshowModal').modal({ show: true });

                //      $('#imgshowModal').modal('show');


                $("#img01").attr("src", $(this).css('background-image').replace('url(', '').replace(')', '')
                    .replace(/\"/gi, ""));

            });

            $("#sidebarToggleTop").click(function() {



                if($( "#main-left-nav" ).hasClass( "d-none"))
                {
                    $("#main-left-nav").removeClass("d-none")
                }
                else
                {
                    $("#main-left-nav").addClass("d-none");
                }





            });

        });
        $(document).ready(function(){
            $('#carouselExampleIndicators').carousel();

            $('.carousel-inner .carousel-item img').on('click', function() {
                // Get the source of the clicked image
                var imgSrc = $(this).attr('src');

                // Set the src of the modal image to the clicked image
                $('#modalImage').attr('src', imgSrc);

                // Show the modal
                $('#imageModal').modal('show');
            });
        });
    </script>

</body>

</html>
