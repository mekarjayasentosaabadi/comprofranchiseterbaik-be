@extends('layoutbackend.app')
@section('title')
    Backpanel | User
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Table User</h4>
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                        <li class="fa fa-plus"></li> Tambah User
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="tbl-user">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photos</th>
                                            <th>Name</th>
                                            <th>Email</th>
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
            table = $('#tbl-user').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.getAll') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'pictures',
                        name: 'pictures'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
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

        function resetPassword(txt, i) {
            console.log(i)
            Swal.fire({
                title: 'Are you sure?',
                text: "Kamu akan mereset password user ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result) {
                    $.ajax({
                        url: window.location.origin + '/' + listRoutes['user.resetpassword'].replace('{id}', i),
                        type: "POST",
                        dataType: "JSON",
                        success: function(e) {
                            if(e.meta.code == 200){
                                notifSweetAlertSuccess(e.meta.message);
                                table.ajax.reload();
                            }
                        },
                        error: function(e){
                            if(e.status == 422){
                                notifSweetAlertErrors(e.responseJSON.message);
                            }
                        }
                    })
                }
            })
        }
    </script>
@endpush
