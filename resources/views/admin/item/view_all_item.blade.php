@extends('admin.user-master')

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">View All Items</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($product as $products)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $products->Title }}</td>
                            <td>{{ $products->Description }}</td>
                            <td>{{ $products->Price }}</td>
                            <td>
                                @if ($products->Image)
                                    <img src="{{ asset($products->Image) }}" alt="Product Image"
                                        style="max-width: 50px; max-height: 50px;">
                                @else
                                    <p>No image</p>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                <a href="{{ route('admin.item.edit', $products->id) }}" class="btn btn-primary">Edit</a>

                                <!-- Add SweetAlert confirmation for delete -->
                                <form method="POST" action="{{ route('admin.item.delete', $products->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger show_confirm" 
                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
