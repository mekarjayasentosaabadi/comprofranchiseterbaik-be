@extends('layoutbackend.app')
@section('title')
    Backpanel | List Items Edit
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">List Items</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit List Items</h4>
                    <a href="{{ route('listitem.index') }}" class="btn btn-warning btn-sm">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="" id="formaddlistitem" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('storage/listitem/'.$data->icons) }}" alt="" id="img-thumbnail" class="img-thumbnail" width="200px">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <label for="">Title List Item</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title List Item" value="{{ $data->judul }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Icons</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Descripton</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                                        {!! $data->description !!}
                                    </textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary btn-md float-end"><li class="fa fa-save"></li> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addons-js')
    <script src="{{ asset('assetsbackend/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/notifsweetalert.js') }}"></script>
    <script>
        let base = new URL(window.location.href);
        let path = base.pathname;
        let segment = path.split("/");
        let itemId = segment["3"];
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description', options)

        $(document).ready(function() {
            $('#formaddlistitem').validate({
                rules: {
                    'title' : 'required',
                    'description' : 'required'
                },
                submitHandler: function(e){
                    $.ajax({
                        url: window.location.origin + '/' + listRoutes['listitem.update'].replace('{id}', itemId),
                        type: "POST",
                        dataType: "JSON",
                        data: new FormData($('#formaddlistitem')[0]),
                        processData: false,
                        contentType: false,
                        success: function(e){
                            notifSweetAlertSuccess(e.meta.message);
                            // $('#formaddlistitem').trigger('reset');
                            $('#description').val('')
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
        })
    </script>
@endpush
