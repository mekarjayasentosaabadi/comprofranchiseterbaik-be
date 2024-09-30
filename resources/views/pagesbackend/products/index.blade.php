@extends('layoutbackend.app')
@section('title')
    Backpanel | Products Index
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Table Products</h4>
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-md">
                        <li class="fa fa-plus"></li> Tambah Products
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="tbl-products">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Thumbnails</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Menu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/notifsweetalert.js') }}"></script>
    <script>
        var idHeader = undefined;
        $(document).ready(function() {
            table = $('#tbl-products').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.getAll') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'pictures',
                        name: 'pictures'
                    },
                    {
                        data: 'prices',
                        name: 'prices'
                    },
                    {
                        data: 'toggle',
                        name: 'toggle'
                    },
                    {
                        data: 'toggleMenu',
                        name: 'toggleMenu'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })
        })
        //changeStatus
        function changeStatus(txt, i) {
            var baseUrl = window.location.origin;
            $.ajax({
                url: baseUrl + '/' + listRoutes['product.changeStatus'].replace('{id}', i),
                type: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(e) {
                    if (e.data.statusCode == 200) {
                        notifSweetAlertSuccess(e.meta.message);
                    } else(
                        notifSweetAlertSuccess(e.meta.message)
                    )
                    table.ajax.reload();
                },
                error: function(e) {
                    console.log(e)
                    alert('Gagal mengeksekusi data.!')
                }
            })
        }
        //changeMenu
        function changeMenu(txt, i) {
            var baseUrl = window.location.origin;
            $.ajax({
                url: baseUrl + '/' + listRoutes['product.changeMenu'].replace('{id}', i),
                type: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(e) {
                    if (e.data.statusCode == 200) {
                        notifSweetAlertSuccess(e.meta.message);
                    } else(
                        notifSweetAlertSuccess(e.meta.message)
                    )
                    table.ajax.reload();
                },
                error: function(e) {
                    console.log(e)
                    alert('Gagal mengeksekusi data.!')
                }
            })
        }
        //delete products
        function deleteProduct(txt, i) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                $.ajax({
                    url: window.location.origin + '/' + listRoutes['product.delete'].replace('{id}', i),
                    type: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(e) {
                        if(e.meta.code == 200){
                            notifSweetAlertSuccess(e.meta.message)
                            setTimeout(function(){
                                table.ajax.reload();
                            }, 1500)
                        }
                    },
                    error: function(e){
                        if(e.status == 422){
                            notifSweetAlertErrors(e.responseJSON.message);
                        }
                    }
                })
            })
        }
    </script>
@endpush
