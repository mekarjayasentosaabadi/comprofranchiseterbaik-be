@extends('layoutfrontend.app')
@section('title', 'Detail')
@section('content')
    <div class="section bg-light">
        <div class="container" style="margin-top: 200px; margin-bottom:200px;">
        <div class="row justify-content-between mb-5" data-aos="fade-up">
            <div class="col-lg-5 mb-5 mb-lg-0">
            <div class="img-about">
                <img src="{{ asset('assetfrontend/images/home/product/Asset-TopCoat-1126x1536.jpg') }}" alt="Image" class="img-fluid w-100"/>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <div><a href="#" class="btn btn-primary"><i class="bi bi-whatsapp"></i> Hubungi Kami</a></div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="fs-4 text-justify">
                <h1 class="fw-bold text-primary">TOPCOAT</h1>
                <h5 class="fw-normal text-black">SALON MOBIL & ANTI KARAT</h5>
                <p>
                    TOPCOAT merupakab brand jaringan bengkel modern
                    yang bergerak di bidang Detailing Coating (salon
                    mobil) & Anti Karat dibawah naungan MAKKO Group.
                    Keunggulan TOPCOAT adalah produk Sapphire Serum
                    Coating dan Powerfull Rust Protection yang dihasilkan
                    dengan inovasi terbaru sehingga memberikan hasil
                    kualitas tertinggi bagi konsumen pemilik mobil.
                </p>
            </div>
            <div class="d-flex justify-content-between flex-wrap fs-5 text-black-50">
                <a href=""><i class="bi bi-instagram"></i> topcoat-indonesia</a>
                <a href=""><i class="bi bi-globe2"></i> www.top-coating.com</a>
            </div>
            </div>
        </div>
        </div>
    </div>
@endSection