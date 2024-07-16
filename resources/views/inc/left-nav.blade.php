<nav class="navbar  align-items-start sidebar border-right d-none d-sm-block  accordion  p-0  topbar sticky-top"
     id="main-left-nav">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#/">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>LeaseLuxe</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="#/home" title="Home"><i
                        class="fas fa-home"></i><span>&nbsp;Home</span></a></li>

            <li class="nav-item"><a class="nav-link v-nav-link  " href="index.html"><i
                        class="fas fa-user-edit"></i><span>&nbsp;Tenants Posts</span></a></li>
            <li class="nav-item"><a class="nav-link v-nav-link" href="OwnersPosts.html"><i
                        class="fas fa-table"></i><span>&nbsp;Owners Posts</span></a></li>
            <li class="nav-item"><a class="nav-link v-nav-link" href="#/auth/messages"><i
                        class="fas fa-envelope fa-fw"></i><span>&nbsp;Messages</span></a></li>
            <li class="nav-item"><a class="nav-link v-nav-link" href="#/auth/notifications"><i
                        class="fas fa-bell fa-fw"></i><span>&nbsp;Notifications</span></a></li>
            <li class="nav-item"><a class="nav-link v-nav-link" href="#/wensi"><i
                        class="fas fa-user"></i><span>&nbsp;Profile</span></a></li>
            <li class="nav-item"><a class="nav-link v-nav-link" href="#/auth/settings">
                    <i class="fas fa-cogs"></i><span>&nbsp;Settings</span></a>


                <hr class="sidebar-divider">
            </li>
        </ul>
        <div class="text-center  d-md-inline"><a class="btn btn-primary" id="btn-post-info" href="{{route('admin.create-post')}}" role="button">Post</a></div>
    </div>
</nav>
