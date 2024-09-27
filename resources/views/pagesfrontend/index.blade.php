@extends('layoutfrontend.app')
@section('title', 'Home | Informasi Lengkap Seputar Franchise | Bisnis Waralaba Terbaik')
@section('content')
  {{-- hero --}}
  <section>
    <div class="hero">
      <div class="hero-slide">
          <div class="img overlay" style="background-image: url('{{ asset('storage/headerbanner/'.$headerbanner->banners) }}')"></div>
        </div>

        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="text-center">
              <h1 class="heading fw-bolder" style="font-size: 4rem;" data-aos="fade-up">{{ $headerbanner->title }}</h1>            
              <div class="d-flex justify-content-center">
                <p class="text-white col-md-8 fw-normal fs-5 col-lg-7" data-aos="fade-up">Solusi kemitraan dengan investasi terjangkau, mudah dijalankan, berprofit tinggi, dan minim resiko</p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  {{-- /hero --}}

  {{-- about --}}
  <section>
    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row mb-5 align-items-center" data-aos="fade-right">
          <div class="col-md-8">
            <h5 class="font-weight-bold text-primary mb-4 mb-md-0">
                KENAPA HARUS BERGABUNG DENGAN KAMI
            </h5>
            <h1 class="fw-bold">{{ $master->titleheader }}</h1>
          </div>
        </div>
        <div class="row justify-content-between mb-5" data-aos="fade-up">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="{{ asset('storage/masterweb/'.$master->thumbnailheader) }}" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4 ">
            <p class="fs-4 text-justify">
               {{ $master->descriptionheader }}
            </p>
            <div><a href="https://wa.me/{{ $master->whatsapp_number }}" class="btn btn-primary"><i class="bi bi-whatsapp"></i> Hubungi Kami</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- /about --}}

  {{-- itmes --}}
  <section class="features-1">
    <div class="container">
      <div class="row">
        @foreach ($listitems as $listitem)
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="box-feature">
            <div>
              <img  class="img-fluid" src="{{ asset('storage/listitem/'.$listitem->icons) }}" alt="...">
            </div>
            <div class="d-flex justify-content-center">
              <h3 class="my-3 col-md-5  text-primary">{{ $listitem->judul }}</h3>
            </div>
            <div>
              {!! $listitem->description !!}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  {{-- itmes --}}

  {{-- profit --}}
  <section>
    <div class="section bg-primary">
      <div class="container">
        <div class="row mb-5 align-items-center" data-aos="fade-right">
          <div class="col-md-8">
            <h5 class="font-weight-bold text-white mb-4 mb-md-0">
                KEUNTUNGAN MENJADI MITRA KAMI
            </h5>
            <h1 class="text-white fw-bold">ANDA MASIH GALAU INGIN BERGABUNG DENGAN KAMI?</h1>
          </div>
        </div>
        <div class="row justify-content-between mb-5 text-white">
          <div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>100% Profit milik mitra*</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Mengurangi resiko kerugian</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Gratis royalty fee & franchise fee*</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Terbantu dari segi brand dan merk</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Tidak perlu improvisasi atau membayar konsultan</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Peluang bisnis besar karena jumlah kendaraan terus meningkat</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Sebagai mitra, anda akan diberikan sebuah program pelatihan</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Menambah keterampilan, pengalaman, dan mengetahui cara kerja perusahaan</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Didukung oleh perusahaan yangsesuai bidang usaha nya sangat berpengalaman di industri kemitraan</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up"  data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Dapat memiliki bisnis dan sistem bisnis yang bagus dalam waktu yang relatif singkat dan mudah</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up"  data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Bisnis kemitraan yang ditawarkan memilki kemungkinan sukses lebih besar dari pada model bisnis lainnya</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Tempat usaha fleksibel, bisa diruko / rumah / pergudangan / mall / perkantoran / pusat onderdil, dil</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Tidak perlu membuat sistem bisnis, SOP, cara menangani konsumen, pengemban Produk dan jasa dijual dengan harga lebih terjangkau sehingga mempunyai target market konsumen yang sangat luas</p>
            </div>
            <div class="fs-5 d-flex gap-2" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <p>Produk dan jasa dijual dengan harga lebih terjangkau sehingga mempunyai target market konsumen yang sangat luas</p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- /profit --}}
  
  {{-- franchise-list --}}
  <section>
    <div class="section section-properties">
      <div class="container">
        <div class="row mb-5 align-items-center" data-aos="fade-right">
          <div>
            <h5 class="text-primary font-weight-bold text-white mb-4 mb-md-0">
              APA SAJA FRANCHISE YANG KAMI PUNYA?
            </h5>
            <h1 class="fw-bold text-black">DAFTAR BEBERAPA FRANCHISE TERBAIK</h1>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">

          @foreach ($franchises as $franchise)
            <div class="col" data-aos="fade-up" data-aos-delay="500">
              <div class="property-item mb-30 shadow-sm d-flex flex-column h-100">
                <a href="/show-franchise/{{ $franchise->slug }}" class="img">
                  <img src="{{ asset('storage/products/'.$franchise->thumbnail) }}" alt="Image" class="img-fluid w-100 crop-img" />
                </a>
                <div class="property-content mt-auto flex-grow-1 d-flex flex-column">
                  <div>
                    <span class="text-muted fw-bold" style="font-size: 14px; text-decoration: line-through;">
                      @if ($franchise->discount != 0)
                        {{ formatRupiah($franchise->discount) }}
                      @endif
                    </span>
                  </div>
                  <div class="price mb-2">
                    <span style="font-size: 24px;">
                      {{ formatRupiah($franchise->prices) }}
                    </span>
                  </div>
                  <div class="flex-grow-1">
                    <span class="city d-block">{{ $franchise->judul }}</span>
                    <span class="d-block py-3 fw-bold">{{ $franchise->title }}</span>
                  </div>
                  <div class="mt-auto d-flex flex-wrap gap-1">
                    <a href="/show-franchise/{{ $franchise->slug }}" class="btn btn-outline-primary py-2 px-3">Lihat Detail</a>
                    <a href="https://wa.me/{{ $franchise->contact }}" class="btn btn-primary py-2 px-3">Hubungi Kami</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

          
          {{-- <div class="col" data-aos="fade-up" data-aos-delay="500">
            <div class="property-item mb-30 shadow-sm d-flex flex-column h-100">
              <a href="#" class="img">
                <img src="{{ asset('assetfrontend/images/home/product/Asset-XTO-1128x1536.jpg') }}" alt="Image" class="img-fluid w-100 crop-img" />
              </a>
              <div class="property-content mt-auto flex-grow-1 d-flex flex-column">
                <div>
                  <span class="text-muted fw-bold" style="font-size: 14px; text-decoration: line-through;">
                    Rp 200.000.000
                  </span>
                </div>
                <div class="price mb-2">
                  <span style="font-size: 24px;">
                    Rp 99.000.000
                  </span>
                </div>
                <div class="flex-grow-1">
                  <span class="city d-block">XTO CAR CARE</span>
                  <span class="d-block py-3 fw-bold">DETAILING COATING & REST PROJECTION</span>
                </div>
                <div class="mt-auto d-flex flex-wrap gap-1">
                  <a href="#" class="btn btn-outline-primary py-2 px-3">Lihat Detail</a>
                  <a href="#" class="btn btn-primary py-2 px-3">Hubungi Kami</a>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
        
        
        <!-- <div class="row align-items-center py-5">
          <div class="col-lg-3">Pagination (1 of 10)</div>
          <div class="col-lg-6 text-center">
            <div class="custom-pagination">
              <a href="#">1</a>
              <a href="#" class="active">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  {{-- /franchise-list --}}
@endsection