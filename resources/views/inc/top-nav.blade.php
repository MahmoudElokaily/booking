@php
    use App\Models\Message;$userId = Auth::id();

            // Get the latest users the authenticated user has chatted with, ordered by the latest message
            $messages = Message::where('sender_id', Auth::id())
                ->orWhere('receiver_id', $userId)
                ->with(['sender', 'receiver']) // Load related sender and receiver
                ->orderBy('created_at', 'desc') // Order by latest message
                ->get()
                ->unique(function ($message) use ($userId) {
                    // Group messages by the other user in the chat
                    return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
                });
@endphp

<nav class="navbar navbar-light navbar-expand bg-white border-bottom  topbar sticky-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"
                type="button"><i class="fas fa-bars"></i></button>
        <span id="smlogo" class="d-md-none"
              style="font-size:1.1rem;color:blue;font-weight:700">Knighbours</span>
        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 md-md-noney-md-0 mw-100 navbar-search">
            <div class="input-group"><input class="bg-light form-control border-0 small search-value" type="text"
                                            placeholder="Search for ...">
                <div class="input-group-append">
                    <button class="btn btn-primary py-0" id="search-button"
                            type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                                aria-expanded="false" href="#"><i
                        class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto navbar-search w-100">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                                        placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="button"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            @auth
                {{--                <li class="nav-item m-auto"> --}}
                {{--                    <div class="nav-item dropdown no-arrow"> --}}
                {{--                        <a href="{{route('admin.create-post')}}" type="button" class="btn btn-primary"> --}}
                {{--                            + --}}
                {{--                        </a> --}}

                {{--                    </div> --}}
                {{--                </li> --}}

                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link last-messages" href="#">
                            <i class="fas fa-envelope fa-fw"></i>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in last-message-show">
                            <h6 class="dropdown-header">Message center</h6>

                            @foreach($messages as $message)
                                <a class="d-flex align-items-center dropdown-item" href="#">
                                    <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                                               src="@if(isset($message->receiver->photo)) {{asset('images/' . $message->receiver->name . "/" . $message->receiver->photo)}} @else {{asset('images/default/default.jpg')}} @endif">
                                        <div class="bg-success status-indicator"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><span>{{$message->message}}</span></div>
                                        <p class="small text-gray-500 mb-0">{{$message->receiver->name}} - {{\Carbon\Carbon::parse($message['created_at'])->diffForHumans()}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                               aria-expanded="false" href="{{ route('profile.edit') }}"><span
                                class="d-none d-lg-inline mr-2 text-gray-600 small">{{ auth()->user()->name }}</span><img
                                class="border rounded-circle img-profile"
                                src="@if (auth()->check() && isset(auth()->user()->photo) && auth()->user()->photo != '') {{ asset('images/' . auth()->user()->name . '/' . auth()->user()->photo) }}  @else {{ asset('images/default/default.jpg') }} @endif"></a>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item"
                                                                                                   href="{{ route('dashboard') }}"><i
                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Dashboard</a><a
                                class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </li>
            @endauth
            @guest
                <a type="button" href="{{ route('login') }}" class="btn btn-primary m-3">Login</a>
                <a type="button" href="{{ route('register') }}" class="btn btn-primary m-3">Signup</a>

            @endguest

        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

