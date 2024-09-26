@extends('layoutbackend.app')
@section('title')
    Backpanel | Profile
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile User</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Change Password</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                            <div class="row">
                                <form action="" id="form-add-edit-user" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <img src="{{ asset('storage/user/'.Auth::user()->photos) }}" alt="" class="img-thumbnail" id="img-thumbnail" width="300px">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="nameUser">Name</label>
                                        <input type="text" name="nameUser" id="nameUser" class="form-control" placeholder="Name User" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="089xxxxxxxx" value="{{ Auth::user()->phonenumber }}">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="abc@xyz.com" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="photos">Photos</label>
                                        <input type="file" name="photos" id="photos" class="form-control">
                                        <small class="text-danger "><i> * Photos is optional</i></small>
                                    </div>
                                    <div class="form-group mt-1">
                                        <button type="submit" class="btn btn-primary btn-md float-end"><li class="fa fa-save"></li> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                            <div class="row">
                                <form action="" id="formupdatepassword" method="POST">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="oldPassword">Old Password</label>
                                            <input type="password" name="oldPassword" id="oldPassword" class="form-control">
                                        </div>
                                        <div class="form group">
                                            <label for="newPassword">New Password</label>
                                            <input type="password" name="newPassword" id="newPassword" class="form-control">
                                        </div>
                                        <div class="form group">
                                            <label for="confirmPassword">Confirm New Password</label>
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
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
    </div>
@endsection
@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/notifsweetalert.js') }}"></script>
    <script>
        $('#form-add-edit-user').validate({
            rules: {
                'nameUser': 'required',
                'phoneNumber':'required',
                'email':'required',
            },
            submitHandler: function(form){
                $.ajax({
                    url: window.location.origin + '/' + listRoutes['profile.update'],
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData($('#form-add-edit-user')[0]),
                    contentType: false,
                    processData: false,
                    success: function(e) {
                        if(e.meta.code == 200){
                            notifSweetAlertSuccess(e.meta.message)
                            setTimeout(function(){
                                location.reload();
                            }, 1500)
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
        $('#formupdatepassword').validate({
            rules: {
                'oldPassword': 'required',
                'newPassword':'required',
                'confirmPassword':{
                    required: true,
                    equalTo: '#newPassword'
                },
            },
            submitHandler: function(form){
                $.ajax({
                    url: window.location.origin + '/' + listRoutes['profile.updatepassword'],
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData($('#formupdatepassword')[0]),
                    contentType: false,
                    processData: false,
                    success: function(e) {
                        if(e.meta.code == 422){
                            notifSweetAlertErrors(e.meta.message);
                        }else{
                            notifSweetAlertSuccess(e.meta.message);
                            setTimeout(function(){
                                location.replace(window.location.origin + '/backpanel');
                            }, 1500);
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
