@extends('index')

@section("title" , $title ?? "")

@section("content")
    <!-- Modal Structure -->
    <!-- Modal Structure -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">
                    <h5 class="modal-title" id="imageModalLabel">Image</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: black; ">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0" style="text-align: center;">
                    <div id="carouselModal" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="carouselModalImages" style="height: 500px; height: 600px;">
                            <!-- Images will be dynamically loaded here -->
                        </div>
                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#carouselModal" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselModal" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row v-body">

        <div class="col-lg-8 col-md-12 border-right">

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
            <div class="info-list">
                <ul class="list-group posts">

                    @foreach($posts as $post)
                        <li class="list-group-item">
                        <article href="/qiongliwu/posts/27294">
                            <div class="d-inline-flex" style="width:100%"> <a href="#/qiongliwu">
                                    <div class="info_author_photo pl-2 pt-2"><img
                                            src="@if(isset($post['user']['photo'])) {{asset('images/' . $post['user']['name'] . "/" . $post['user']['photo'])}} @else {{asset('images/default/default.jpg')}} @endif"
                                            alt="..." style="width:3rem;height:3rem"
                                            class="mr-3 rounded-circle"></div>
                                </a>
                                <div class="flex-fill pt-2">
                                    <div class="d-flex">
                                        <div class="d-flex info_author">
                                            <div>

                                                <div class="d-flex">
                                                    <a href="#/qiongliwu" class="text-a">
                                                        <div style="line-height:100%"> <span
                                                                class="v-text-s">
                                                                                {{$post['user']['name'] ?? ""}}</span>
                                                        </div>
                                                    </a>
                                                    <div class="pl-2 text-m">
                                                        <span class="text-to">{{$post['user']['email'] ?? ""}}</span>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="pl-2">.
                                                <a href="#/qiongliwu/posts/27294" class="text-a">
                                                    {{\Carbon\Carbon::parse($post['created_at'])->diffForHumans()}} </a>
                                            </div>
                                        </div>
                                        <div
                                            class=" el-action-s menu-icon pl-2 pr-2 rounded-circle ml-auto">
                                            <div class="dropleft" data-toggle="tooltip"
                                                 data-placement="top" title=""
                                                 data-original-title="more">
                                                                <span data-toggle="dropdown" aria-expanded="false">
                                                                    <svg viewBox="0 0 24 24" aria-hidden="true"
                                                                         class="blue" style="height:1.25rem;width:1.25rem; line-height: 1.65em;
                        cursor: pointer;">
                                                                        <g>
                                                                            <circle cx="5" cy="12" r="2"></circle>
                                                                            <circle cx="12" cy="12" r="2"></circle>
                                                                            <circle cx="19" cy="12" r="2"></circle>
                                                                        </g>
                                                                    </svg></span>

                                                <div class="dropdown-menu p-3">
                                                    <div
                                                        class="d-flex div-info-more-item dropdown-item">
                                                        <div><i
                                                                class="fas fa-envelope fa-fw"></i>
                                                        </div>
                                                        <div class="ml-2">
                                                            <a href="{{route('chat' , $post['user']['id'] ?? "")}}">
                                                                <span>Message - {{$post->user->name ?? ""}}</span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="info-intro text-truncate" style="max-width: 500px">
                                        <span class="text-success "></span>
                                        {{$post['description']}}
                                    </div>
                                    @if(isset($post['fileNames']) && $post['fileNames'] != "")
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach(json_decode($post['fileNames']) as $index => $file)
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach(json_decode($post['fileNames']) as $index => $file)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img class="d-block w-100"
                                                             src="{{ asset('images/owner/' . $post['user']['name'] . '/' . $file) }}"
                                                             alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
{{--                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
{{--                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                                                <span class="sr-only">Previous</span>--}}
{{--                                            </a>--}}
{{--                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
{{--                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                                                <span class="sr-only">Next</span>--}}
{{--                                            </a>--}}
                                        </div>
                                    @endif


                                    {{--                                    @if( isset($post['fileNames']) && $post['fileNames'] != "")--}}
{{--                                        <div class="info-photo mr-3 border rounded p-1">--}}
{{--                                            <div class="info-img-box ">--}}
{{--                                                @foreach(json_decode($post['fileNames']) as $index => $file)--}}
{{--                                                    @if (($index % 2) == 0)--}}
{{--                                                        <div class="info-img-box-c">--}}
{{--                                                    @endif--}}
{{--                                                        <div class="info-img-content post-image" datai="0"--}}
{{--                                                             style="background-image: url('{{asset('images/owner/' . $post['user']['name'] . '/' . $file)}}');">--}}
{{--                                                            <img draggable="false" class="css-img-p"--}}
{{--                                                                 src="">--}}
{{--                                                        </div>--}}

{{--                                                    @if(($index % 2) == 0)--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                         </div>--}}

{{--                                    </div>--}}
{{--                                    @endif--}}
                                    <div class="d-flex justify-content-around p-3 div-share-likes-reply">

                                        <div class="el-action-s  p-1 pl-2 pr-2 " data-toggle="tooltip"
                                             title="" data-original-title="Chat"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512">
                                                <path
                                                    d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1 .9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9 .7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z" />
                                            </svg>
                                            <a href="{{route('chat' , $post['user']['id'] ?? "")}}">
                                                <span class="pl-1">Connect</span>
                                            </a>
                                            <div class="dropdown-menu p-3">
                                                <div class="d-flex div-info-more-item dropdown-item el-Chat"
                                                     datau="27294">
                                                    <div><svg xmlns="http://www.w3.org/2000/svg"
                                                              viewBox="0 0 576 512">
                                                            <path
                                                                d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1 .9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9 .7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Chat</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @php
                                            $currentPost = \App\Models\Post::FindOrFail($post['id']);
                                            $liked = auth()->check() && $currentPost->isLikedBy(auth()->user());
                                        @endphp

                                        <div class="el-action-s el-likes p-1 pl-2 pr-2" datau="27294">
                                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"
                                                 data-toggle="tooltip" title=""
                                                 class="rounded-circle p-1 like-button" data-original-title="Like" data-id="{{$post['id']}}">
                                                <path class="@if($liked) liked @endif"
                                                    d="M15.43 8.814c.808-3.283 1.252-8.814-2.197-8.814-1.861 0-2.35 1.668-2.833 3.329-1.971 6.788-5.314 7.342-8.4 7.743v9.928c3.503 0 5.584.729 8.169 1.842 1.257.541 3.053 1.158 5.336 1.158 2.538 0 4.295-.997 5.009-3.686.5-1.877 1.486-7.25 1.486-8.25 0-1.649-1.168-2.446-2.594-2.507-1.21-.051-2.87-.277-3.976-.743zm3.718 4.321l-1.394.167s-.609 1.109.141 1.115c0 0 .201.01 1.069-.027 1.082-.046 1.051 1.469.004 1.563l-1.761.099c-.734.094-.656 1.203.141 1.172 0 0 .686-.017 1.143-.041 1.068-.056 1.016 1.429.04 1.551-.424.053-1.745.115-1.745.115-.811.072-.706 1.235.109 1.141l.771-.031c.822-.074 1.003.825-.292 1.661-1.567.881-4.685.131-6.416-.614-2.238-.965-4.437-1.934-6.958-2.006v-6c3.263-.749 6.329-2.254 8.321-9.113.898-3.092 1.679-1.931 1.679.574 0 2.071-.49 3.786-.921 5.533 1.061.543 3.371 1.402 6.12 1.556 1.055.059 1.025 1.455-.051 1.585z">
                                                </path>
                                            </svg> <span class="pl-1 num-of-likes">{{ count($post->likes) ?? 0 }}</span>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </article>


                    </li>
                    @endforeach





                </ul>
            </div>


{{--            <div class="d-flex  justify-content-center m-3 pageslist">--}}
{{--                <div class="mr-5">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="disabled">--}}
{{--                        <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z">--}}
{{--                        </path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div class="ml-5">--}}
{{--                    <a href="?page=2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title=""--}}
{{--                             viewBox="0 0 24 24" data-original-title="Next Page">--}}
{{--                            <path--}}
{{--                                d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z">--}}
{{--                            </path>--}}
{{--                        </svg></a>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <div class="col-lg-4 mb-4 pr-0">
            <style type="text/css">
                .card-body .user-list-item span {
                    font-size: 0.6rem;
                    height: 0.6rem;
                }

                .text-ms {
                    font-size: 0.8em
                }

                .tagdiv:hover {
                    background-color: #dcdfe9
                }
            </style>
            @include('inc.suggestion')
        </div>
    </div>
@endsection


