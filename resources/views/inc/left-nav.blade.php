<nav class="navbar  align-items-start sidebar border-right d-none d-sm-block  accordion  p-0  topbar sticky-top"
     id="main-left-nav">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{route('home')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" >
            </div>
            <div class="sidebar-brand-text mx-3"><span>{{ config('app.name')}}</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link @isset($title) @if($title != "Home") v-nav-link @endif @endisset" href="{{route('home')}}" title="Home"><i
                        class="fas fa-home"></i><span>&nbsp;Home</span></a></li>

            <li class="nav-item"><a class="nav-link  @isset($title) @if($title != "Offering") v-nav-link @endif @endisset " href="{{route('tenant-posts')}}"><i
                        class="fas fa-user-edit"></i><span>&nbsp;Offering</span></a></li>
            <li class="nav-item"><a class="nav-link @isset($title) @if($title != "Looking") v-nav-link @endif @endisset" href="{{route('owner-posts')}}"><i
                        class="fas fa-table"></i><span>&nbsp;Looking</span></a></li>
            <li class="nav-item"><a class="nav-link v-nav-link" href="{{route('dashboard')}}"><i
                        class="fas fa-envelope fa-fw"></i><span>&nbsp;Messages</span></a></li>
{{--            <li class="nav-item"><a class="nav-link v-nav-link" href="#/auth/notifications"><i--}}
{{--                        class="fas fa-bell fa-fw"></i><span>&nbsp;Notifications</span></a></li>--}}
            @auth
                <li class="nav-item"><a class="nav-link v-nav-link" href="{{route('profile.edit')}}"><i
                            class="fas fa-user"></i><span>&nbsp;Profile</span></a></li>
            @endauth
            <li class="nav-item"><a class="nav-link v-nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-cogs"></i><span>Dashboard</span></a>
        </ul>
    </div>
</nav>
