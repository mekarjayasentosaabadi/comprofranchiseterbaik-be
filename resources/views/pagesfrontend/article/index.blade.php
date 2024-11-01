@extends('layoutfrontend.app')
@section('title', 'Home | Informasi Lengkap Seputar Franchise | Bisnis Waralaba Terbaik')
@section('content')
    @if ($articles->count() > 0)
        <section>
            <div class="section bg-light">
                <div class="container" style="margin-top: 200px; margin-bottom:200px;">
                    <div class="row justify-content-between mb-5" data-aos="fade-up">
                        <div class="col-lg-9 mb-5 mb-lg-0 mb-2">
                            {{-- <div style="width: 230px; height: 80px;" class="mb-3">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ asset('storage/article/'.$articles[0]->logo) }}" alt="">
                            </div> --}}
                            <div class="img-about mb-4">
                                <div class="container-image-hiro-article">
                                    <img src="{{ asset('storage/article/'.$articles[0]->thumbnail) }}" alt="Image" class="img-fluid w-100 rounded-3" style="object-fit: cover; width: 100%; height: 100%;" />
                                </div>
                            </div>
                            <div class="mb-5">
                                <p class="text-black fw-bold text-primary">
                                    {{ 
                                        \Carbon\Carbon::parse($articles[0]->publishdate ?? $articles[0]->created_at)->format('d F Y') 
                                    }}  
                                </p>
                                <h1 class="mb-4 fw-bold text-dark fs-3">{{ $articles[0]->title }}</h1>
                                <p class="fs-5 text-black mb-3 text-black">   {!! Str::limit(strip_tags($articles[0]->content), 100) !!}</p>
                                <a href="/article/{{ $articles[0]->slug }}" class="btn btn-primary  mt-3">VIEW DETAIL</a>
                            </div>
                            <hr class="mb-5">
                            <div>
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    @foreach ($articles->skip(1) as $article)
                                    <div class="col-md-6 d-flex align-items-stretch">
                                        <div class="card">
                                            <div style="height: 315px; width: 100%; overflow: hidden;">
                                                <img src="{{ asset('storage/article/'.$article->thumbnail) }}" class="card-img-top"
                                                    style="object-fit: cover; width: 100%; height: 100%;" alt="...">
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <small>
                                                   <b class="text-primary">
                                                        {{ 
                                                            \Carbon\Carbon::parse($article->publishdate ?? $article->created_at)->format('d F Y') 
                                                        }}    
                                                    </b>
                                                </small>
                                                <h5 class="card-title py-3 fw-bold"><a class="text-black" href="/article/{{ $article->slug }}">{{ $article->title }}</a></h5>
                                                {{-- <p class="card-text text-3-line mb-4">{!! Str::limit(strip_tags($article->content), 200) !!}</p> --}}
                                                <a href="/article/{{ $article->slug }}" class="btn btn-primary py-2 px-3 mt-auto" style="width: 150px">VIEW DETAIL</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-5 d-flex justify-content-center">
                                    {{ $articles->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="fs-4">
                                <div class="mb-5">
                                    <h3 class="fw-bold text-black mb-3">Recent</h3>
                                    @foreach ($recentArticles as $recentArticle)
                                        <div class="card border-0 bg-transparent">
                                            <a href="/article/{{ $recentArticle->slug }}">
                                                <div class="d-flex gap-2 g-0">
                                                    <div class="">
                                                        <div style="width: 115px; height: 80px;">
                                                        <img style="object-fit: cover; width: 100%; height: 100%;" src="{{ asset('storage/article/'.$recentArticle->thumbnail) }}" class="img-fluid rounded-2 ">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="card-body p-0">
                                                            <div style="font-size: 12px;" class="text-black text-start">{{ $recentArticle->title }}</div>
                                                            {{-- <div style="font-size: 12px;" class="text-black text-start">{!! Str::limit(strip_tags($article->content), 50) !!}</div> --}}
                                                            <div style="font-size: 12px;">
                                                                <small class="text-primary">
                                                                    {{ \Carbon\Carbon::parse($recentArticle->publishdate ?? $recentArticle->created_at)->format('d F Y')  }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                                <div>
                                    <h3 class="fw-bold text-black mb-3">Popular Hastag</h3>
                                    @foreach ($populartags as $populartag)
                                        <a href="/article/hastag/{{ $populartag->slug }}" class="badge mb-2 badge-tags-news border border-1 border-primary rounded-1 fw-normal">{{ $populartag->name }} ({{ $populartag->articletag_count }})</a> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="section bg-light">
                <div class="container" style="margin-top: 200px; margin-bottom:200px;">
                    <h1 class="text-center fw-bold" style="color: gray">ARTICLE NOT FOUND :(</h1>
                </div>
            </div>
        </section>
    @endif
@endsection
