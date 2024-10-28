@extends('layoutfrontend.app')
@section('title')
    Article | {{ $article->title }}
@endsection
@section('content')
    {{-- @push('header-image')
        <div class="header-image" style=" background-image: url('{{ asset('assetfrontend/images/hero_bg_1.jpg') }}');">
            <div class="header-overlay-image"></div>
            <div class="d-flex justify-content-center align-items-center h-100" style="position: relative;">
            <h3 class="text-center text-white" data-aos="fade-up">Artikel Detail</h3>
            </div>
        </div>
    @endpush --}}
    <section>
        <div class="section bg-light">
            <div class="container" style="margin-top: 200px; margin-bottom:200px;">
                <div class="row justify-content-between mb-5" data-aos="fade-up">
                    <div class="col-lg-9 mb-5 mb-lg-0">
                        @if ($article->logo != null)
                            <div class="container-image-logo-article" class="mb-4">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ asset('storage/article/'.$article->logo) }}" alt="">
                            </div>
                        @endif
                        <div class="container-image-hiro-article mt-2">
                            <img src="{{ asset('storage/article/'.$article->thumbnail) }}" alt="Image" class="img-fluid w-100 rounded-3" style="object-fit: cover; width: 100%; height: 100%;" />
                        </div>
                        <div class="mb-5">
                            <p class="fw-bold mt-4 text-primary">
                               {{  \Carbon\Carbon::parse($article->publishdate ?? $article->created_at)->format('d F Y')  }}
                            </p>
                            <h1 class="mb-4 fw-bold text-dark fs-3">{{ $article->title }}</h1>
                            <div class="text-black fs-6 text-dark">
                               {!! $article->content !!}
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
                                <h3 class="fw-bold text-black mb-3">Hastag</h3>
                                @foreach ($hastags as $hastag)
                                    <a href="/article/hastag/{{ $hastag->tag->slug }}" class="badge mb-2 badge-tags-news border border-1 border-primary rounded-1 fw-normal">{{ $hastag->tag->name }}</a> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
