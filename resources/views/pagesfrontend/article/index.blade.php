@extends('layoutfrontend.app')
@section('title', 'Home | Informasi Lengkap Seputar Franchise | Bisnis Waralaba Terbaik')
@section('content')
    <section>
        <div class="section bg-light">
            <div class="container" style="margin-top: 200px; margin-bottom:200px;">
                <div class="row justify-content-between mb-5" data-aos="fade-up">
                    <div class="col-lg-9 mb-5 mb-lg-0">
                        <div class="img-about ">
                            <img src="{{ asset('assetfrontend/images/home/article/article6.jpg') }}" alt="Image" class="img-fluid w-100 rounded-3" />
                        </div>
                        <div class="mb-5">
                            <h1>Daftar Franchise Terbaik 2024 !</h1>
                            <p class="fs-5 text-black">Lihat daftar franchise terbaik di tahun 2024..</p>
                            <a href="/article/show-article" class="btn btn-primary py-2 px-3 mt-2">VIEW DETAIL</a>
                        </div>
                        <hr class="mb-5">
                        <div>
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <div class="col  d-flex align-items-stretch">
                                    <div class="card">
                                        <div style="height: 315px; width: 100%; background-color: red; overflow: hidden;">
                                            <img src="{{ asset('assetfrontend/images/home/article/article7.jpg') }}" class="card-img-top"
                                                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <small><b>20-12-2024</b></small>
                                            <h5 class="card-title"><a href="">TOP COAT INDONESIA</a></h5>
                                            <p class="card-text text-3-line">Bergabung bersama dengan franchiseterbaik seperti
                                                dokter mobil memberikan akses ke brand yang sudah di uji dukungan pelatihan,
                                                panduan lokasi, kualitas produk yang...</p>
                                            <a href="" class="btn btn-primary py-2 px-3 mt-2">VIEW DETAIL</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col  d-flex align-items-stretch">
                                    <div class="card">
                                        <div style="height: 315px; width: 100%; background-color: red; overflow: hidden;">
                                            <img src="{{ asset('assetfrontend/images/home/article/article8.jpg') }}" class="card-img-top"
                                                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <small><b>20-12-2024</b></small>
                                            <h5 class="card-title">FRANCHISE PIJAT TERBAIK ? </h5>
                                            <p class="card-text text-3-line">Bergabung bersama dengan franchiseterbaik seperti
                                                dokter mobil memberikan akses ke brand yang sudah di uji dukungan pelatihan,
                                                panduan lokasi, kualitas produk yang...</p>
                                            <a href="" class="btn btn-primary py-2 px-3 mt-2">VIEW DETAIL</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col  d-flex align-items-stretch">
                                    <div class="card">
                                        <div style="height: 315px; width: 100%; background-color: red; overflow: hidden;">
                                            <img src="{{ asset('assetfrontend/images/home/article/article9.jpg') }}" class="card-img-top"
                                                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <small><b>20-12-2024</b></small>
                                            <h5 class="card-title">MAU PUNYA FRANCHISE CUCI HELM MOTOR ? </h5>
                                            <p class="card-text text-3-line">Bergabung bersama dengan franchiseterbaik seperti
                                                dokter mobil memberikan akses </p>
                                            <a href="" class="btn btn-primary py-2 px-3 mt-2">VIEW DETAIL</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col  d-flex align-items-stretch">
                                    <div class="card">
                                        <div style="height: 315px; width: 100%; background-color: red; overflow: hidden;">
                                            <img src="{{ asset('assetfrontend/images/home/article/article9.png') }}" class="card-img-top"
                                                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <small><b>20-12-2024</b></small>
                                            <h5 class="card-title">MAU PUNYA FRANCHISE CUCI HELM MOTOR ? </h5>
                                            <p class="card-text text-3-line">Bergabung bersama dengan franchiseterbaik seperti
                                                dokter mobil memberikan akses </p>
                                            <a href="" class="btn btn-primary py-2 px-3 mt-2">VIEW DETAIL</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="fs-4">
                            <div class="mb-5">
                                <h3 class="fw-bold text-black">Recent</h3>
                                <div class="card mb-3">
                                    <a href="">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img style="object-fit: cover; width: 100%; height: 100%;"
                                                    src="{{ asset('assetfrontend/images/home/article/article7.jpg') }}"
                                                    class="img-fluid rounded-start " alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <p style="font-size: 12px;" class="text-black text-start">TOP COAT INDONESIA
                                                    </p>
                                                    <p style="font-size: 12px;"><small class="text-primary">Jumat 16 Agustus
                                                            2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card mb-3">
                                    <a href="">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img style="object-fit: cover; width: 100%; height: 100%;"
                                                    src="{{ asset('assetfrontend/images/home/article/article8.jpg') }}"
                                                    class="img-fluid rounded-start " alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <p style="font-size: 12px;" class="text-black text-start">FRANCHISE PIJAT
                                                        TERBAIK ?</p>
                                                    <p style="font-size: 12px;"><small class="text-primary">Jumat 16 Agustus
                                                            2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card mb-3">
                                    <a href="">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img style="object-fit: cover; width: 100%; height: 100%;"
                                                    src="{{ asset('assetfrontend/images/home/article/article9.jpg') }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <p style="font-size: 12px;" class="text-black text-start">MAU PUNYA
                                                        FRANCHISE CUCI HELM MOTOR ?</p>
                                                    <p style="font-size: 12px;"><small class="text-primary">Jumat 16 Agustus
                                                            2024</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <h3 class="fw-bold text-black">Pupular Tages</h3>
                                <a href=""
                                    class="badge badge-tags-news border border-2 border-primary rounded-5 fw-normal">Otomotif(78)</a>
                                <a href=""
                                    class="badge badge-tags-news border border-2 border-primary rounded-5 fw-normal">Franchise(80)</a>
                                <a href=""
                                    class="badge badge-tags-news border border-2 border-primary rounded-5 fw-normal">Franchiseterbaik(82)</a>
                                <a href=""
                                    class="badge badge-tags-news border border-2 border-primary rounded-5 fw-normal">Pijatkeluarga(29)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
