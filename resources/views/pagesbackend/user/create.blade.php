@extends('layoutbackend.app')
@section('title')
    Backpanel | User Create
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Add User</h4>
                    <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm"><li class="fa fa-undo"></li> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="form-add-user" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nameUser">Name</label>
                                    <input type="text" name="nameUser" id="nameUser" class="form-control" placeholder="Name User">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="089xxxxxxxx">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="abc@xyz.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password">
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
@endsection
@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/notifsweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#form-add-user').validate({
                rules: {
                    'nameUser' : 'required',
                    'phoneNumber' : 'required',
                    'email' : 'required',
                    'password' : 'required',
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "{{ route('user.store') }}",
                        type: "POST",
                        dataType: "JSON",
                        data: new FormData($('#form-add-user')[0]),
                        contentType: false,
                        processData: false,
                        success: function(e) {
                            if(e.meta.code == 200){
                                notifSweetAlertSuccess(e.meta.message);
                                $('#form-add-user')[0].reset();
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
