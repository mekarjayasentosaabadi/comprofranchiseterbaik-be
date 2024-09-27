@extends('layoutfrontend.app')
@section('title', 'Home | Informasi Lengkap Seputar Franchise | Bisnis Waralaba Terbaik')
@section('content')
  {{-- hero --}}
  <section>
    <div class="hero">
      <div class="hero-slide">
          <div class="img overlay" style="background-image: url('{{ asset('assetfrontend/images/home/hero.jpg') }}')"></div>
          <!-- <div class="img overlay" style="background-image: url('images/hero_bg_2.jpg')"></div>
          <div class="img overlay" style="background-image: url('images/hero_bg_1.jpg')"></div> -->
        </div>

        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
              <h1 class="heading" data-aos="fade-up">BERGABUNG BERSAMA</h1>
              <h1 class="heading fw-bolder" style="font-size: 4rem;" data-aos="fade-up">FRANCHISE TERBAIK</h1>            
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
            <h1 class="fw-bold">Prospek Bisnis Paling Menguntungkan Di Tahun Ini</h1>
          </div>
        </div>
        <div class="row justify-content-between mb-5" data-aos="fade-up">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="{{ asset('assetfrontend/images/home/about.jpg') }}" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4 ">
            <p class="fs-4 text-justify">
                Perusahaan kami (MAKKO Group) telah
                sangat lama berpengalaman di industri
                otomotif, kuliner, pijat & refleksi. Dan
                telah meraih berbagai penghargaan
                serta semakin di akui keberadaannya
                sebagai produk dan jasa yang
                berkualitas baik bagi masyarakat.
            </p>
            <div><a href="#" class="btn btn-primary"><i class="bi bi-whatsapp"></i> Hubungi Kami</a></div>
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
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="box-feature">
             <img src="{{ asset('assetfrontend/images/home/icon/pie-chart.png') }}" alt="...">
            <h3 class="mb-3 text-primary">TARGET MARKET <br> LUAS</h3>
            <p>
              Jangkau pasar yang luas
              dengan berbagai peluang di
              berbagai industri, memastikan
              potensi konsumen yang lebih
              besar.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="400">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/financial-profit.png') }}" alt="...">
            <h3 class="mb-3">PROSPEK SANGAT <br> MENJANJIKAN</h3>
            <p>
              Raih keuntungan signifikan
              dengan model bisnis yang
              telah terbukti sukses dan
              mudah berkembang.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="500">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/arrows.png') }}" alt="...">
            <h3 class="mb-3">PROFIT MARGIN <br> TINGGI</h3>
            <p>
              Dapatkan keuntungan
              maksimal dengan biaya
              operasional yang efisien dan
              margin laba yang optimal.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/businessman.png') }}" alt="...">
            <h3 class="mb-3">TENAGA KERJA <br> PROFESIONAL</h3>
            <p>
              Seluruh SDM yang diberikan
              untuk mitra adalah tenaga
              kerja yang ahli dan sangat
              berpengalaman di bidangnya
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="400">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/team.png') }}" alt="...">
            <h3 class="mb-3">PROSPEK SANGAT <br> MENJANJIKAN</h3>
            <p>
              Seluruh rangkaian kegiatan
              pemasaran atau marketing
              akan dipandu oleh manajemen
              perusahaan kami
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="500">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/tools.png') }}" alt="...">
            <h3 class="mb-3">PERALATAN <br> TERBAIK</h3>
            <p>
              Seluruh peralatan kerja yang
              kami siapkan untuk mitra
              adalah peralatan terbaru yang
              mendukung dalam bekerja
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/money.png') }}" alt="...">
            <h3 class="mb-3">HARGA <br> TERJANGKAU</h3>
            <p>
              Didukung oleh supplier pabrik,
              sehingga konsumen akan
              dapat barang dengan harga
              terjangkau serta garansi resmi
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="400">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/interview.png') }}" alt="...">
            <h3 class="mb-3">KONSULTAN <br> PROFESIONAL</h3>
            <p>
              Anda akan mendapatkan
              konsultasi secara langsung
              dari yang telah berpengalaman
              di bidang nya
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="500">
          <div class="box-feature">
            <img src="{{ asset('assetfrontend/images/home/icon/quality-control.png') }}" alt="...">
            <h3 class="mb-3">KUALITAS <br> PRODUK</h3>
            <p>
              Kualitas pekerjaan terbaik
              adalah budaya perusahaan
              yang selalu terjaga dan
              berkembang untuk
              memastikan kualitas produk
              dan layanan
            </p>
          </div>
        </div>
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
          <div class="col" data-aos="fade-up" data-aos-delay="300">
            <div class="property-item mb-30 shadow-sm d-flex flex-column h-100">
              <a href="detail.html" class="img">
                <img src="{{ asset('assetfrontend/images/home/product/Asset-TopCoat-1126x1536.jpg') }}" alt="Image" class="img-fluid w-100  crop-img" />
              </a>
              <div class="property-content mt-auto flex-grow-1 d-flex flex-column">
                <div class="price mb-2"><span>Rp 1.090.000</span></div>
                <div class="flex-grow-1">
                  <span class="city d-block">TOPCOAT</span>
                  <span class="d-block py-3 fw-bold">SALON MOBIL & ANTIKARAT</span>
                </div>
                <div class="mt-auto">
                  <a href="#" class="btn btn-outline-primary py-2 px-3">Lihat Detail</a>
                  <a href="#" class="btn btn-primary py-2 px-3">Hubungi Kami</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col" data-aos="fade-up" data-aos-delay="400">
            <div class="property-item mb-30 shadow-sm d-flex flex-column h-100">
              <a href="#" class="img">
                <img src="{{ asset('assetfrontend/images/home/product/Asset-Kabuki-1-1125x1536.jpg') }}" alt="Image" class="img-fluid w-100  crop-img" />
              </a>
              <div class="property-content mt-auto flex-grow-1 d-flex flex-column">
                <div class="price mb-2"><span>Rp 1.190.000</span></div>
                <div class="flex-grow-1">
                  <span class="city d-block">KABUKI AUTO SHOP</span>
                  <span class="d-block py-3 fw-bold">TOKO OTOMOTIF</span>
                </div>
                <div class="mt-auto">
                  <a href="#" class="btn btn-outline-primary py-2 px-3">Lihat Detail</a>
                  <a href="#" class="btn btn-primary py-2 px-3">Hubungi Kami</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col" data-aos="fade-up" data-aos-delay="500">
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
          </div>
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