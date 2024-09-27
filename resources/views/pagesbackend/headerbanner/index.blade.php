@extends('layoutbackend.app')
@section('title')
    Backpanel | Header Banner
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Header Banner</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Table Header Banner</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table" id="tbl-headerbanner">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Banner</th>
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
                            <h4>Form Add Edit Header Banner</h4>
                            <form action="" id="form-add-edit-headerbanner" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="subtitle">Subtitle</label>
                                    <textarea name="subtitle" id="subtitle" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="banner">Banner</label>
                                    <input type="file" name="banner" id="banner" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <img src="" alt="" class="img-thumbnail hidden" id="img-thumbnail" width="200px">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-md float-end" type="submit"><li class="fa fa-save"></li> Simpan</button>
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
        var idHeader = undefined;
        $(document).ready(function() {
            table = $('#tbl-headerbanner').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('headerbanner.getAll') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
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

        $('#form-add-edit-headerbanner').validate({
            rules: {
                'title'     : 'required',
                'subtitle'  : 'required'
            },
            submitHandler: function(form) {
                if(idHeader == undefined){
                    var url = "{{ route('headerbanner.store') }}";
                } else {
                    var url = window.location.origin + '/' + listRoutes['headerbanner.update'].replace('{id}',idHeader);
                }
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($('#form-add-edit-headerbanner')[0]),
                    processData: false,
                    contentType: false,
                    success: function(e){
                        notifSweetAlertSuccess(e.meta.message);
                        table.ajax.reload();
                        $('#form-add-edit-headerbanner').trigger('reset');
                        idHeader = undefined;
                        $('#img-thumbnail').attr('src', '');
                    },
                    error: function(e){
                        console.log(e)
                        alert('Gagal mengeksekusi data.!')
                    }
                })
            }
        })
                //changeStatus
        function changeStatus(txt, i){
            var baseUrl = window.location.origin;
            $.ajax({
                url: baseUrl+'/'+listRoutes['headerbanner.changeStatus'].replace('{id}',i),
                type: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(e){
                    if(e.data.statusCode == 200){
                        notifSweetAlertSuccess(e.meta.message);
                    } else (
                        notifSweetAlertErrors(e.meta.message)
                    )
                    console.log(e)
                    table.ajax.reload();
                },
                error: function(e){
                    console.log(e)
                    alert('Gagal mengeksekusi data.!')
                }
            })
        }
        //edit Data
        function editData(txt, i){
            $.getJSON(window.location.origin + '/' + listRoutes['headerbanner.show'].replace('{id}', i), function(data) {

            }).done(function(e){
                $('#title').val(e.data[0].title)
                $('#subtitle').val(e.data[0].subtitle)
                $('#img-thumbnail').removeClass('hidden')
                $('#img-thumbnail').attr('src', "{{ asset('storage/headerbanner/') }}"+'/'+e.data[0].banners)
                idHeader = e.data[0].id
            }).fail(function(e){
                console.log(e)
            })
        }
    </script>
@endpush
