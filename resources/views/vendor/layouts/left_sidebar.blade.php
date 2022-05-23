<nav class="side-navbar box-scroll sidebar-scroll" tabindex="1" style="overflow: hidden; outline: none;">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li class="">
            <a href="{{route('vendor_dashboard')}}"><i class="la la-columns"></i><span>Dashboard</span></a>
        </li>
        <li>
        <a href="{{route('vendor_orders')}}"><i class="la la-list"></i><span>My Orders</span></a>
    </li>
    <li>
        <a href="{{route('renewal_orders')}}"><i class="la la-list"></i><span>Renewal Orders</span></a>
    </li>
    <li>
        <a href="{{route('vendor_payments')}}"><i class="la la-list"></i><span>My Payments</span></a>
    </li>
    <li>
        <a href="{{route('add_new_document_vendor')}}"><i class="la la-plus"></i><span>Add new document</span></a>
    </li>
    <li>
        <a href="{{route('view_documents_vendor')}}"><i class="la la-list"></i><span>Document List</span></a>
    </li>
    <li>
        <a href="{{route('vendor_report')}}"><i class="la la-list"></i><span>Balance Sheet</span></a>
    </li>
    <li class=""><a href="{{route('logout')}}"><i class='la la-unlock'></i><span>Logout</span></a></li>
    </ul>
    <!-- End Main Navigation -->
</nav>
