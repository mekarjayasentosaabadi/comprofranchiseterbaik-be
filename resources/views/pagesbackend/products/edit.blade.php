@extends('layoutbackend.app')
@section('title')
    Backpanel | Products Edit
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Products</h4>
                    <a href="{{ route('product.index') }}" class="btn btn-warning btn-md"><li class="fa fa-undo"></li> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="formeditproducts" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control" value="{{ $data->judul }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="" value="{{ $data->title }}">
                                </div>
                                <div class="form-group mt-1">
                                    <img src="{{ asset('storage/products/'.$data->thumbnail) }}" alt="" width="200px" class="img-thumbnail">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="thumbnail">Change Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="prices">Prices</label>
                                    <input type="number" name="prices" id="prices" class="form-control" value="{{ $data->prices }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="discount">Discount</label>
                                    <input type="number" name="discount" id="discount" class="form-control" value="{{ $data->discount }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="contact" id="contact" class="form-control" value="{{ $data->contact }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $data->description !!}</textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <h4 class="mt-3">Social Media Account</h4>
                                    <button class="btn btn-outline-primary" onclick="getDataMediaSocial()" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><li class="fa fa-plus"></li>Add MedSos</button>
                                </div>
                                <div id="accountMediaSocial" class="mt-3">

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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Data table Media Socials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table" id="tbl-mediasocial">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icons</th>
                                    <th>Name</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
@endsection
@push('addons-js')
    <script src="{{ asset('assetsbackend/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/notifsweetalert.js') }}"></script>
    <script>
        var tableMedsos;
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
        var dataMedsos = [];
        $.getJSON(window.location.origin +'/' + listRoutes['product.getdetailmedsos'].replace('{id}', itemId), function(data) {

        }).done(function(e){
            if(e.data.medsos.length > 0){
                e.data.medsos.map((x)=>{
                    let medsos = {
                        name : x.mediasocial.name,
                        icons : x.mediasocial.icons,
                        nameSave: x.medsos_name,
                        iMedsos : x.id,
                        status: "Old"
                    }
                    dataMedsos.push(medsos)
                })
                getDataMedsos();
            }
        }).fail(function(e){
            console.log(e)
        })
        const getDataMedsos = () => {
            $('#accountMediaSocial').html('')
            dataMedsos.map((x,i)=>{
                $('#accountMediaSocial').append(`
                <div class="d-flex mt-2" >
                    <div class="flex-shrink-1 col-sm-1 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/mediasocial/') }}/${x.icons}" alt="google" class="me-2" style="width: auto; height: 38px;" />
                    </div>
                    <div class="flex p-2"></div>
                    <div class="flex align-item-center justify-content-between flex-grow-1">
                        <div class="me-1 col-md-6">
                            <input type="text" name="nameMedsos[]" id="google" class="form-control" onchange="changeNameMedsos(${x.iMedsos})" placeholder="Write the account medsos ${x.name}" value="${x.nameSave == null ? '' : x.nameSave}">
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
        }
        $(document).ready(function() {
            $('#formeditproducts').validate({
                rules: {
                    'judul': 'required',
                    'title': 'required',
                    // 'thumbnail': 'required',
                    'prices': 'required',
                    'discount': 'required',
                    'contact': 'required',
                    'description': 'required'
                },
                submitHandler: function(e){
                    var editor = CKEDITOR.instances['description'];
                    var descriptions = editor.getData();
                    var formData = new FormData($('#formeditproducts')[0]);
                    formData.append('dataMedsos', JSON.stringify(dataMedsos));
                    formData.append('descriptions', descriptions);
                    $.ajax({
                        url: window.location.origin + '/' + listRoutes['product.update'].replace('{id}', itemId),
                        type: "POST",
                        dataType: "JSON",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(e) {
                            if(e.meta.code == 200){
                                notifSweetAlertSuccess(e.meta.message);
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                                // $('#form-add-products')[0].reset();
                            }
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

        function getDataMediaSocial(){
            tableMedsos = $('#tbl-mediasocial').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.getDataMedsos') }}",
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })
            tableMedsos.destroy();
        }

        function chooseData(txt, i){
            $.getJSON(window.location.origin + '/' + listRoutes['product.chooseMedsos'].replace('{id}', i), function(data) {

            }).done(function(e){
                let newmedsos = {
                    name : e.data[0].name,
                    icons : e.data[0].icons,
                    nameSave: "",
                    iMedsos : e.data[0].id,
                    status: "New"
                }
                dataMedsos.push(newmedsos)
                getDataMedsos()
            }).fail(function(i){
                console.log(i)
            })
        }
    </script>
@endpush
