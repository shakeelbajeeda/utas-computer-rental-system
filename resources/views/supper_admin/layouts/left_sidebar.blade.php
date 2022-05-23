<nav class="side-navbar box-scroll sidebar-scroll" tabindex="1" style="overflow: hidden; outline: none;">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li class="">
            <a href="{{route('dashboard')}}"><i class="la la-columns"></i><span>Dashboard</span></a>
        </li>
        <li class="">
            <a href="{{route('edit_profile')}}"><i class="la la-columns"></i><span>Update Profile</span></a>
        </li>

         <li class="">
            <a href="#dropdown-users" aria-expanded="@if($nav_active=='users') true @else false @endif" data-toggle="collapse"><i class="la la-user"></i><span>User Management</span></a>
            <ul id="dropdown-users" class="collapse @if($nav_active=='users') show @endif list-unstyled pt-0">
                <li>
                    <a href="{{route('users.create')}}"><i class="la la-plus"></i><span>Add New User</span></a>
                </li>
                <li>
                    <a href="{{route('users.index')}}"><i class="la la-list"></i><span>Customers List</span></a>
                </li>
                <li>
                    <a href="{{route('view_all_staff')}}"><i class="la la-list"></i><span>Staff List</span></a>
                </li>
                <li>
                    <a href="{{route('web_managers')}}"><i class="la la-list"></i><span>Web Managers List</span></a>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#dropdown-users" aria-expanded="@if($nav_active=='users') true @else false @endif" data-toggle="collapse"><i class="la la-home"></i><span>Services</span></a>
            <ul id="dropdown-users" class="collapse @if($nav_active=='users') show @endif list-unstyled pt-0">
                <li>
                    <a href="{{route('users.create')}}"><i class="la la-plus"></i><span>Add New User</span></a>
                </li>
                <li>
                    <a href="{{route('users.index')}}"><i class="la la-list"></i><span>Customers List</span></a>
                </li>
            </ul>
        </li>
        <li class=""><a href="{{route('logout')}}"><i class='la la-unlock'></i><span>Logout</span></a></li>
    </ul>
    <!-- End Main Navigation -->
</nav>
