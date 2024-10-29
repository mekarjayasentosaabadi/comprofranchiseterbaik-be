@extends('layoutbackend.app')
@section('title')
    Backpanel | Article
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Article</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Table Article</h4>
                    <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm">
                        <li class="fa fa-plus"></li> Tambah Article
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="tbl-article">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thumbnail</th>
                                            <th>Logo</th>
                                            <th>Title</th>
                                            <th>Tanggal Publish</th>
                                            <th>Status Publish</th>
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
            table = $('#tbl-article').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('article.getAll') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'pictures',
                        name: 'pictures'
                    },
                    {
                        data: 'logo',
                        name: 'logo'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'publishdate',
                        name: 'publishdate'
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
                url: baseUrl+'/'+listRoutes['article.changeStatus'].replace('{id}',i),
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
        function deleteList(txt, i) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin akan menghapus data tersebut.?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: window.location.origin + '/' + listRoutes['article.delete'].replace('{id}', i),
                        type: "POST",
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        success: function(e) {
                            notifSweetAlertSuccess(e.meta.message);
                            table.ajax.reload()
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    })
                }
            })
        }
        function deleteLogo(txt, id){
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin akan menghapus logo pada artikel tersebut.?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: window.location.origin + '/' + listRoutes['article.deletelogo'].replace('{id}', id),
                        type: "POST",
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        success: function(e) {
                            notifSweetAlertSuccess(e.meta.message);
                            table.ajax.reload()
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    })
                }
            })
        }
    </script>
@endpush
