@extends('layoutbackend.app')
@section('title')
    Backpanel | Products Create
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Add Products</h4>
                    <a href="{{ route('product.index') }}" class="btn btn-warning btn-md"><li class="fa fa-undo"></li> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="formaddproducts" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="prices">Prices</label>
                                    <input type="number" name="prices" id="prices" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="discount">Discount</label>
                                    <input type="number" name="discount" id="discount" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="contact" id="contact" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <h4 class="mt-3">Social Media Account</h4>
                                <div id="accountMediaSocial">

                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary btn-md float-end" type="submit"><li class="fa fa-save"></li> Simpan</button>
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
        var dataMedsos = [];
        $.getJSON("{{ route('mediasocial.getaccountmediasocial') }}", function(data) {

        }).done(function(e){
            if(e.data.medsos.length > 0){
                e.data.medsos.map((x)=>{
                    let medsos = {
                        name : x.name,
                        icons : x.icons,
                        nameSave: null,
                        iMedsos : x.id,
                        status: "No"
                    }
                    dataMedsos.push(medsos)
                })
                getDataMedsos();
            }
        }).fail(function(e){
            console.log(e)
        })
        const getDataMedsos = () => {
            dataMedsos.map((x,i)=>{
                $('#accountMediaSocial').append(`
                <div class="d-flex mt-2" >
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/mediasocial/') }}/${x.icons}" alt="google" class="me-1" height="38" width="38" />
                    </div>
                    <div class="d-flex align-item-center justify-content-between flex-grow-1">
                        <div class="me-1 col-md-6">
                            <input type="text" name="nameMedsos[]" id="google" class="form-control" onchange="changeNameMedsos(${x.iMedsos})" placeholder="Write the account medsos ${x.name}">
                            <input type="hidden" name="iMed${x.iMedsos}" value="${x.iMedsos}">
                        </div>
                    </div>
                </div>
                `)
            })
        }
        function changeNameMedsos(id){
            const index = dataMedsos.findIndex(medsos => medsos.iMedsos === id);
            if(index !== -1){
                const newName = $('#accountMediaSocial input[name="nameMedsos[]"]').eq(index).val();
                dataMedsos[index].nameSave = newName;
            }
            console.log(dataMedsos);
        }
        $(document).ready(function() {
            $('#formaddproducts').validate({
                rules: {
                    'judul': 'required',
                    'title': 'required',
                    'thumbnail': 'required',
                    'prices': 'required',
                    'discount': 'required',
                    'contact': 'required',
                    'description': 'required'
                },
                submitHandler: function(e){
                    var editor = CKEDITOR.instances['description'];
                    var descriptions = editor.getData();
                    var formData = new FormData($('#formaddproducts')[0]);
                    formData.append('dataMedsos', JSON.stringify(dataMedsos));
                    formData.append('descriptions', descriptions);
                    $.ajax({
                        url: "{{ route('product.store') }}",
                        type: "POST",
                        dataType: "JSON",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(e) {
                            console.log(e)
                            if(e.meta.code == 200){
                                notifSweetAlertSuccess(e.meta.message);
                                // $('#form-add-products')[0].reset();
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
        })
    </script>
@endpush
