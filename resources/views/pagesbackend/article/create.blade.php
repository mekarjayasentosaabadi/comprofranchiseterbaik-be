@extends('layoutbackend.app')
@section('title')
    Backpanel | Article
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Article</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Article</h4>
                    <a href="{{ route('article.index') }}" class="btn btn-warning btn-sm">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="" id="formaddarticle" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Descripton</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Tags</label>
                                    <input type="text" id="tags" name="tags" class="form-control" placeholder="contoh: tag1, tag2, tag3">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
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
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description', options)

        $(document).ready(function() {
            $('#formaddarticle').validate({
                rules: {
                    'title' : 'required',
                    'thumbnail'  : 'required',
                    'description' : 'required',
                    'tags'  : 'required'
                },
                submitHandler: function(e){
                    var formData = new FormData($('#formaddarticle')[0]);
                    formData.append('description', CKEDITOR.instances.description.getData());
                    $.ajax({
                        url: "{{ route('article.store') }}",
                        type: "POST",
                        dataType: "JSON",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(e){
                            notifSweetAlertSuccess(e.meta.message);
                            $('#formaddarticle').trigger('reset');
                            $('#description').val('')
                            CKEDITOR.instances.description.setData('');
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
        // $(document).ready(function() {
        //     $(document).ready(function() {
        //         $('#tags').select2({
        //                 tags: true, // Aktifkan fitur penambahan tag baru
        //                 tokenSeparators: [','], // Pisahkan tag dengan koma
        //                 placeholder: 'Masukkan tag',
        //                 // Opsi lainnya: minimumInputLength, maximumSelectionLength, dll.
        //             });
        //         });
        // })
    </script>
@endpush
