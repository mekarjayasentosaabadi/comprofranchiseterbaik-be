@extends('layoutbackend.app')
@section('title')
    Backpanel | User Update
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Users</h4>
                    <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm"><li class="fa fa-undo"></li> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="col-xl-12 col-lg-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="detail-tab" data-bs-toggle="tab" href="#detailUser" aria-controls="home" role="tab" aria-selected="true">Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#updateProfile" aria-controls="profile" role="tab" aria-selected="false">Update Profile</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="detailUser" aria-labelledby="detail-tab" role="tabpanel">
                                        <img src="{{ $dataUser->photos == 'default.png' ? asset('images/user/images.jpeg') : asset('storage/user/'.$dataUser->photos) }}" alt=""  class="img-thumbnail" width="250px">
                                        <div class="row">
                                            <div class="row mt-1">
                                                <span for="" class="col-sm-2">Name</span>
                                                <div class="col-sm-10">
                                                    <span for="">: {{ $dataUser->name }}</span>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <span for="" class="col-sm-2">Email</span>
                                                <div class="col-sm-10">
                                                    <span for="">: {{ $dataUser->email }}</span>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <span for="" class="col-sm-2">Phone Number</span>
                                                <div class="col-sm-10">
                                                    <span for="">: {{ $dataUser->phonenumber }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="updateProfile" aria-labelledby="profile-tab" role="tabpanel">
                                        <form action="" method="POST" id="form-update-user" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nameUser">Name</label>
                                                        <input type="text" name="nameUser" id="nameUser" class="form-control" placeholder="Name User" value="{{ $dataUser->name }}">
                                                    </div>
                                                    <div class="form-group mt-1">
                                                        <label for="phoneNumber">Phone Number</label>
                                                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="089xxxxxxxx" value="{{ $dataUser->phonenumber }}">
                                                    </div>
                                                    <div class="form-group mt-1">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="abc@xyz.com" value="{{ $dataUser->email }}">
                                                    </div>
                                                    <div class="form-group mt-1">
                                                        <label for="photos">Photos</label>
                                                        <input type="file" name="photos" id="photos" class="form-control">
                                                        <small class="text-danger "><i> * Photos is optional</i></small>
                                                    </div>
                                                    <div class="form-group mt-1">
                                                        <button type="submit" class="btn btn-primary btn-md float-end"><li class="fa fa-save"></li> Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
        let base = new URL(window.location.href);
        let path = base.pathname;
        let segment = path.split("/");
        let userId = segment["3"];
        $(document).ready(function() {
            $('#form-update-user').validate({
                rules: {
                    'nameUser' : 'required',
                    'phoneNumber' : 'required',
                    'email' : 'required',
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: window.location.origin + '/' + listRoutes['user.update'].replace('{id}', userId),
                        type: "POST",
                        dataType: "JSON",
                        data: new FormData($('#form-update-user')[0]),
                        contentType: false,
                        processData: false,
                        success: function(e) {
                            if(e.meta.code == 200){
                                notifSweetAlertSuccess(e.meta.message);
                                $('#form-update-user')[0].reset();
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
    </script>
@endpush
