<nav class="side-navbar box-scroll sidebar-scroll" tabindex="1" style="overflow: hidden; outline: none;">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li class=""><a href="{{route('dashboard')}}"><i class="la la-columns"></i><span>Dashboard</span></a></li>

        <li class=""><a href="{{route('update_identity')}}"><i class="la la-user"></i><span>Update Identity</span></a></li>
        @if(auth()->user()->is_address_assign)
        <li class=""><a href="{{route('agrement')}}"><i class='la la-columns'></i><span>Sign Terms & Conditions</span></a></li>
        @endif
        <!-- <li class=""><a href="{{route('view_all_packages')}}"><i class='la la-columns'></i><span>View All Packages</span></a></li> -->
        <li class=""><a href="{{route('my_orders')}}"><i class='la la-columns'></i><span>My Orders</span></a></li>
        <li class=""><a href="{{route('my_documents')}}"><i class='la la-columns'></i><span>View All Documents</span></a></li>
        <li class=""><a href="{{route('logout')}}"><i class='la la-unlock'></i><span>Logout</span></a></li>
    </ul>
    <!-- End Main Navigation -->
</nav>
