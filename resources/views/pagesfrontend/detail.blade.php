@extends('layoutfrontend.app')
@section('title')
    {{ $franchise->judul }}
@endsection
@section('custom-css')
    <style>
        .icon-img {
            width: 20px;   
            height: 20px;  
            object-fit: contain; 
        }
    </style>
@endsection
@section('content')
    <div class="section bg-light">
        <div class="container" style="margin-top: 200px; margin-bottom:200px;">
        <div class="row justify-content-between mb-5" data-aos="fade-up">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="img-about">
                    <img src="{{ asset('storage/products/'.$franchise->thumbnail) }}" alt="Image" class="img-fluid w-100"/>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <div><a target="blank" href="https://wa.me/{{ $franchise->contact }}" class="btn btn-primary"><i class="bi bi-whatsapp"></i> Hubungi Kami</a></div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="fs-4 text-justify">
                <h1 class="fw-bold text-primary">{{ $franchise->judul }}</h1>
                <h5 class="fw-normal text-black mb-4">{{ $franchise->title }}</h5>
                <div class="fs-5 text-black">
                    {!! $franchise->description !!}
                </div>
            </div>
            <div class="d-flex flex-wrap fs-5 text-black-50">
                @foreach ($franchisemedsos as $franchisemedso)
                    @if ($franchisemedso->medsos_name != null)
                        <p class="text-black me-5 mb-2">
                            <img class="img-fluid icon-img" src="{{ asset('storage/mediasocial/'.$franchisemedso->mediasocial->icons) }}" alt="">
                            {{ $franchisemedso->medsos_name }}
                        </p>
                    @endif
                @endforeach
            </div>            
        </div>
        </div>
    </div>
@endSection