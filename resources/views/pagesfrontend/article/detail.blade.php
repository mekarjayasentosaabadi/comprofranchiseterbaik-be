@extends('layoutfrontend.app')
@section('title', 'Informasi Lurator Seputar Franchise | Bisnis Waralaba Terbaik')
@section('content')
    @push('header-image')
        <div class="header-image" style=" background-image: url('{{ asset('assetfrontend/images/hero_bg_1.jpg') }}');">
            <div class="header-overlay-image"></div>
            <div class="d-flex justify-content-center align-items-center h-100" style="position: relative;">
            <h3 class="text-center text-white" data-aos="fade-up">Artikel Detail</h3>
            </div>
        </div>
    @endpush
    <section>
        <div class="section bg-light">
            <div class="container" style="margin-top: 100px; margin-bottom:100px;">
                <div class="row justify-content-between mb-5" data-aos="fade-up">
                    <div class="col-lg-9 mb-5 mb-lg-0">
                        <div class="img-about ">
                            <img src="{{ asset('assetfrontend/images/home/article/article6.jpg') }}" alt="Image"
                                class="img-fluid w-100 rounded-3" />
                        </div>
                        <div class="mb-5">
                            <h1 class="pt-5">Daftar Franchise Terbaik 2024 !</h1>
                            <div class="text-black fs-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto aliquam dignissimos
                                    consectetur labore placeat cum repellendus ratione atque impedit consequatur nostrum
                                    neque, laborum commodi, ex optio! Delectus officiis magnam autem ipsa obcaecati corrupti
                                    numquam magni, quasi consequatur modi quas. Minima fugit ea dolorum fugiat officia quod
                                    corrupti doloremque animi ducimus!</p>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, soluta?
                                    Reprehenderit excepturi ut vel ullam eos, ex quae fugiat. Ut labore nam ipsam accusamus
                                    autem voluptates beatae necessitatibus quibusdam libero ducimus laudantium quam
                                    explicabo iusto esse sequi alias et ea ratione tempore ipsum, provident voluptatem eos.
                                    Dolorem voluptate modi aliquid quibusdam. Culpa consectetur sapiente totam, temporibus
                                    sint repudiandae! Quos, recusandae! Ut minus eos delectus, expedita vero non voluptates.
                                    Dolor suscipit harum provident explicabo necessitatibus repellendus, aut nostrum placeat
                                    recusandae, voluptatem in sit fugit, vel iusto asperiores modi culpa similique ullam.
                                    Aspernatur natus quaerat unde nihil quisquam maiores ipsum autem consequuntur!</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, tempora quaerat
                                    cupiditate nesciunt omnis repellat molestias aliquid error recusandae necessitatibus
                                    minima vel magnam, deserunt laboriosam quas eius voluptatum! Ut voluptatem doloribus
                                    ducimus iure fuga saepe illo, nemo recusandae. Quis, molestiae. Explicabo obcaecati unde
                                    veniam distinctio quidem ab labore atque sit, reprehenderit delectus quia magni quae,
                                    perferendis fugiat dolor saepe illo dolorum vel ea provident modi fuga dolores libero.
                                    Dolorem doloribus quos, hic ratione assumenda voluptas pariatur possimus error facilis
                                    eos placeat? Aperiam ipsum libero minima fugit doloribus. Corporis inventore quas
                                    deleniti mollitia. Debitis excepturi non quam deleniti inventore a cupiditate corporis
                                    aliquid temporibus, accusantium error repellat doloremque ipsa tenetur voluptatem ipsum
                                    molestias ducimus. Labore recusandae, quod velit sunt modi nemo?</p>
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
                                                    <p style="font-size: 12px;" class="text-black text-start">TOP COAT
                                                        INDONESIA</p>
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
                                                    <p style="font-size: 12px;" class="text-black text-start">FRANCHISE
                                                        PIJAT TERBAIK ?</p>
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
                                <a href="" class="badge mb-2 badge-tags-news border border-2 border-primary rounded-5 fw-normal">Otomotif(78)</a> 
                                <a href="" class="badge mb-2 badge-tags-news border border-2 border-primary rounded-5 fw-normal">Franchise(80)</a> 
                                <a href="" class="badge mb-2 badge-tags-news border border-2 border-primary rounded-5 fw-normal">Franchiseterbaik(82)</a> 
                                <a href="" class="badge mb-2 badge-tags-news border border-2 border-primary rounded-5 fw-normal">Pijatkeluarga(29)</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
