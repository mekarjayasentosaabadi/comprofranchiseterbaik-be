@extends('layoutbackend.app')
@section('title')
    Backpanel | Dashboard
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i data-feather="users" class="font-large-2 text-primary"></i>
                        </div>
                        <div class="text-end">
                            <h3 class="text-bold-700 mb-1">{{ $sumDataUsers }}</h3>
                            <p class="font-small-2 mb-0">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i data-feather="share-2" class="font-large-2 text-primary"></i>
                        </div>
                        <div class="text-end">
                            <h3 class="text-bold-700 mb-1">{{ $sumDataMediasocial }}</h3>
                            <p class="font-small-2 mb-0">Media Socials</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i data-feather="list" class="font-large-2 text-primary"></i>
                        </div>
                        <div class="text-end">
                            <h3 class="text-bold-700 mb-1">{{ $sumDataListitem }}</h3>
                            <p class="font-small-2 mb-0">List Items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i data-feather="layers" class="font-large-2 text-primary"></i>
                        </div>
                        <div class="text-end">
                            <h3 class="text-bold-700 mb-1">{{ $sumDataProducts }}</h3>
                            <p class="font-small-2 mb-0">Products</p>
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

    </script>
@endpush
