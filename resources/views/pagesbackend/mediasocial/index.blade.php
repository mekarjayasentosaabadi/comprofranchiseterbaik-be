@extends('layoutbackend.app')
@section('title')
    Backpanel | Media Social
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Media Social</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Table Media Socials</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table" id="tbl-mediasocial">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Icons</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>Form Add Edit Media Socials</h5>
                            <form action="" method="POST" id="formaddeditdata" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <label for="nameMedia">Nama Media Socials</label>
                                        <input type="text" name="nameMedia" id="nameMedia" class="form-control">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="icons">Nama Media Socials</label>
                                        <input type="file" name="icons" id="icons" class="form-control">
                                    </div>
                                    <div class="form-group mt-1">
                                        <img src="" alt="" id="img-thumbnails" class="img-thumbnail hidden" width="200px">
                                    </div>
                                    <div class="form-group mt-1">
                                        <button class="btn btn-primary btn-md float-end" type="submit"><li class="fa fa-save"></li> Simpan</button>
                                    </div>
                                </div>
                            </form>
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
        var idMedsos = undefined;
        $(document).ready(function() {
            table = $('#tbl-mediasocial').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('mediasocial.getAll') }}",
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

        //add or edit data
        $('#formaddeditdata').validate({
            rules:{
                'nameMedia' : 'required',
            },
            submitHandler: function(){
                if(idMedsos == undefined){
                    var url = "{{ route('mediasocial.store') }}";
                } else {
                    var url = window.location.origin + '/' + listRoutes['mediasocial.update'].replace('{id}',idMedsos);
                }
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData($('#formaddeditdata')[0]),
                    contentType: false,
                    processData: false,
                    success: function(e){
                        notifSweetAlertSuccess(e.meta.message);
                        table.ajax.reload();
                        idMedsos=undefined;
                        $('#formaddeditdata').trigger('reset');
                        $('#img-thumbnails').addClass('hidden')
                    },
                    error: function(e){
                            if(e.status == 422){
                                notifSweetAlertErrors(e.responseJSON.message);
                            }
                            if(e.status == 413){
                                notifSweetAlertErrors('File terlalu besar, ukuran maksimal 2 MB');
                            }
                    }
                })
            }
        })
        //changeStatus
        function changeStatus(txt, i){
            var baseUrl = window.location.origin;
            $.ajax({
                url: baseUrl+'/'+listRoutes['mediasocial.changeStatus'].replace('{id}',i),
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
        //edit Data
        function editData(txt, i){
            $.getJSON(window.location.origin + '/' + listRoutes['mediasocial.show'].replace('{id}', i), function(data) {

            }).done(function(e){
                console.log(e);
                $('#nameMedia').val(e.data[0].name)
                $('#img-thumbnails').removeClass('hidden')
                $('#img-thumbnails').attr('src', "{{ asset('storage/mediasocial/') }}"+'/'+e.data[0].icons)
                idMedsos = e.data[0].id
            }).fail(function(e){
                console.log(e)
            })
        }
    </script>
@endpush
