@extends('layoutbackend.app')
@section('title')
    Backpanel | Master Web
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Web</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Headers</h4>
                </div>
                <div class="card-body">
                    <form action="" id="formaddheader" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form group">
                                    <label for="titleheader">Title Header</label>
                                    <input type="text" name="titleheader" id="titleheader" class="form-control" value="{{ $dataMaster == null ? '' : $dataMaster->titleheader }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="descriptionheader">Description</label>
                                    <textarea name="descriptionheader" id="" cols="30" rows="10" class="form-control">{{ $dataMaster == null ? '' : $dataMaster->descriptionheader }}</textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <img src="{{ $dataMaster == null ? '' : asset('storage/masterweb/'.$dataMaster->thumbnailheader) }}" alt="" class="img-fluid" width="400px">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="imageheader">Image Header</label>
                                    <input type="file" name="imageheader" id="imageheader" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary float-end" type="submit"><li class="fa fa-save"></li> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Footer</h4>
                </div>
                <div class="card-body">
                    <form action="" id="formaddfooter" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form group">
                                    <label for="titlefooter">Title Footer</label>
                                    <input type="text" name="titlefooter" id="titlefooter" class="form-control" value="{{ $dataMaster == null ? '' : $dataMaster->titlefooter }}">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="descriptionfooter">Description Footer</label>
                                    <textarea name="descriptionfooter" id="" cols="30" rows="10" class="form-control">{{ $dataMaster == null ? '' : $dataMaster->descriptionfooter }}</textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary float-end"><li class="fa fa-save"></li> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="formaddcontact">
                        <div class="row">
                            <div class="col-12">
                                <div class="form group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $dataMaster == null ? '' : $dataMaster->address }}">
                                </div>
                                <div class="form group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $dataMaster == null ? '' : $dataMaster->phone_number }}">
                                </div>
                                <div class="form group">
                                    <label for="whatsapp">Whatsapp Number</label>
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ $dataMaster == null ? '' : $dataMaster->whatsapp_number }}">
                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary float-end"><li class="fa fa-save"></li> Save</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/notifsweetalert.js') }}"></script>
    <script>
        $('#formaddheader').validate({
            rules: {
                'titleheader' : 'required',
                'descriptionheader': 'required',
            },
            submitHandler: function(e){
                $.ajax({
                    url: "{{ route('masterweb.storeheader') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData($('#formaddheader')[0]),
                    contentType: false,
                    processData: false,
                    success: function(e) {
                        if(e.meta.code == 200){
                            notifSweetAlertSuccess(e.meta.message);
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
        $('#formaddfooter').validate({
            rules: {
                'titlefooter' : 'required',
                'descriptionfooter': 'required',
            },
            submitHandler: function(e){
                $.ajax({
                    url: "{{ route('masterweb.storefooter') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData($('#formaddfooter')[0]),
                    contentType: false,
                    processData: false,
                    success: function(e) {
                        if(e.meta.code == 200){
                            notifSweetAlertSuccess(e.meta.message);
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
        $('#formaddcontact').validate({
            rules: {
                'address' : 'required',
                'phone': 'required',
                'whatsapp': 'required',
            },
            submitHandler: function(e){
                $.ajax({
                    url: "{{ route('masterweb.storecontact') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData($('#formaddcontact')[0]),
                    contentType: false,
                    processData: false,
                    success: function(e) {
                        if(e.meta.code == 200){
                            notifSweetAlertSuccess(e.meta.message);
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
    </script>
@endpush
