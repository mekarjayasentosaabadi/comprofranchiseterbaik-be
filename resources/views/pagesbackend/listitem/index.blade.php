@extends('layoutbackend.app')
@section('title')
    Backpanel | List Items
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">List Items</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Table List Items</h4>
                    <a href="{{ route('listitem.create') }}" class="btn btn-primary btn-sm">
                        <li class="fa fa-plus"></li> Tambah List Items
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="tbl-listitem">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Icons</th>
                                            <th>Status</th>
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
        $(document).ready(function() {
            table = $('#tbl-listitem').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('listitem.getAll') }}",
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
                        data: 'toggle',
                        name: 'toggle'
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
        function changeStatus(txt, i){
            var baseUrl = window.location.origin;
            $.ajax({
                url: baseUrl+'/'+listRoutes['listitem.changeStatus'].replace('{id}',i),
                type: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(e){
                    notifSweetAlertSuccess(e.meta.message);
                    table.ajax.reload();
                },
                error: function(e){
                    alert('Gagal mengeksekusi data.!')
                }
            })
        }
    </script>
@endpush
