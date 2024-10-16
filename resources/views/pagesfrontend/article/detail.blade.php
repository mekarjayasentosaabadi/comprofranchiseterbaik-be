@extends('layoutfrontend.app')
@section('title')
    Article | {{ $article->title }}
@endsection
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
                            <img src="{{ asset('storage/article/'.$article->thumbnail) }}" alt="Image"
                                class="img-fluid w-100 rounded-3" />
                        </div>
                        <div class="mb-5">
                            <p class="text-black fw-bold mt-4">{{ $article->created_at->format('d F Y') }}</p>
                            <h1 class="mb-4">{{ $article->title }}</h1>
                            <div class="text-black fs-6 text-dark">
                               {!! $article->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="fs-4">
                            <div class="mb-5">
                                <h3 class="fw-bold text-black">Recent</h3>
                                @foreach ($recentArticles as $recentArticles)
                                    <div class="card mb-3">
                                        <a href="/article/{{ $recentArticles->slug }}">
                                            <div class="row g-0">
                                                <div class="col-md-5">
                                                    <img style="object-fit: cover; width: 100%; height: 100%;"
                                                        src="{{ asset('storage/article/'.$recentArticles->thumbnail) }}"
                                                        class="img-fluid rounded-start ">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="card-body">
                                                        <p style="font-size: 12px;" class="text-black text-start">{{ $recentArticles->title }}</p>
                                                        <p style="font-size: 12px;"><small class="text-primary">{{ $recentArticles->created_at->format('d F Y') }}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <h3 class="fw-bold text-black">Pupular Tages</h3>
                                @foreach ($populartags as $populartag)
                                    <a href="" class="badge mb-2 badge-tags-news border border-2 border-primary rounded-5 fw-normal">{{ $populartag->name }} ({{ $populartag->articletag_count }})</a> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
