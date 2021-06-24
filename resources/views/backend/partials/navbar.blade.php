<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @auth
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('backend.index')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-moon" ></i>
            </div>
            <div class="sidebar-brand-text mx-3"> @role('admin') Admin @else Manager @endrole Dashboard </div>
        </a>
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @auth
        <li class="nav-item active">
            <a class="nav-link" href="{{route('backend.index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endauth

{{--    nav item dashboard end--}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>All Tables</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tables</h6>
                @auth
                    @hasrole('admin')
                        <a class="collapse-item" href="{{route('roles.index')}}">Roles </a>

                        <a class="collapse-item" href="{{route('permissions.index')}}">Permission </a>

                        <a class="collapse-item" href="{{route('restaurants.index')}}">Restaurants </a>

                        <a class="collapse-item" href="{{route('food_categories.index')}}"> Food Categories </a>

                        <a class="collapse-item" href="{{route('profiles.index')}}">Profiles </a>
                    @endhasrole

                    <a class="collapse-item" href="{{route('users.index')}}"> @role('admin') Users @else My Customers @endrole </a>

                    <a class="collapse-item" href="{{route('food.index')}}"> @role('admin') Food @else My Food @endrole </a>

                    <a class="collapse-item" href="{{route('orders.index')}}"> @role('admin') Orders @else My Orders @endrole </a>

                    <a class="collapse-item" href="{{route('payments.index')}}"> @role('admin') Payments @else My Payments @endrole </a>

                    <a class="collapse-item" href="{{route('profiles.index')}}"> My Profile </a>

                    @role('manager')
                        <a class="collapse-item" href="{{route('restaurants.show',[Auth::user()->id])}}">My Resturant </a>
                    @endrole

                @endauth
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    @auth
        @role('admin')

            <li class="nav-item">
                <a class="nav-link" href="{{route('roles.index')}}">
                    <i class="fas fa-registered"></i>
                    <span>Roles</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('permissions.index')}}">
                    <i class="fas fa-registered"></i>
                    <span>Permission</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('restaurants.index')}}">
                    <i class='fas fa-directions'></i>
                    <span>Restaurants</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('food_categories.index')}}">
                    <i class='fas fa-directions'></i>
                    <span>Food Categories</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('profiles.index')}}">
                    <i class='fas fa-directions'></i>
                    <span>Profiles</span></a>
            </li>
        @endrole

        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-users"></i>
                <span> @role('admin') Users @else My Customers @endrole </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('food.index')}}">
                <i class="fas fa-compass"></i>
                <span> @role('admin') Food @else My Food @endrole </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('orders.index')}}">
                <i class="fa fa-h-square" aria-hidden="true"></i>
                <span> @role('admin') Orders @else My Orders @endrole </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('payments.index')}}">
                <i class="fas fa-bed"></i>
                <span>  @role('admin') Payments @else My Payments @endrole </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('profiles.show',[Auth::user()->id])}}">
                <i class="fa fa-h-square" aria-hidden="true"></i>
                <span>My profile</span></a>
        </li>

        @role('manger')
            <li class="nav-item">
                <a class="nav-link" href="{{route('restaurents.show',[Auth::user()->id])}}">
                    <i class="fa fa-h-square" aria-hidden="true"></i>
                    <span>My Restaurent</span></a>
            </li>
        @endrole
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
