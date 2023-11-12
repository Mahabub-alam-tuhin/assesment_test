<div class="page-sidebar custom-scrollbar ">
    <ul class="sidebar-menu" >
        <li>
            <div class="sidebar-title">Mangement</div><a href="javascript:void(0)">

        </li>
        <li>
            <a href="javascript:void(0)">
                <i><a href="{{ route('admin.item.add_item') }}"></i><span>Add item</span><i
                    class="fa fa-plus pull-right"></i></a>

        </li>
        <li>
            <a href="javascript:void(0)"><i><a href="{{ route('admin.item.view_all_item') }}"></i><span>All items</span><i
                    class="fa fa-angle-right pull-right"></i></a>

        </li>

      
    </ul>
    {{-- end sidebar --}}
</div>
@push('custom-js')
    <script>
        // Function to hide the sidebar and header
        function hideSidebarAndHeader() {
            $(".page-sidebar").hide();
            $(".page-body-wrapper").addClass('sidebar-close');
            // Add additional code to hide the header if needed
        }

        // Function to show the sidebar and header
        function showSidebarAndHeader() {
            $(".page-sidebar").show();
            // Add additional code to show the header if needed
        }

        // Check the URL and hide/show sidebar and header as needed
        var currenturl = window.location.href;
        var segments = currenturl.split('/');
        console.log(segments);

        // You can use the segments array to determine which blade file is currently open
        // For example, if a specific URL segment corresponds to "all_details.blade.php"
        if (segments.includes("all_details")) {
            hideSidebarAndHeader();
        } else {
            showSidebarAndHeader();
        }
    </script>
@endpush

