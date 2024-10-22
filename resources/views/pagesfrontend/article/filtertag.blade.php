@extends('layoutfrontend.app')
@section('title')
    Article | Tag
@endsection
@section('content')
    <section>
        <div class="container" style="margin-top: 200px; margin-bottom:200px;">
            <div class="mb-5">
                <h1 class="fw-bold" style="font-size: 50px;">{{ $tagname }}</h1>
                <!-- <p><a href="" class="text-dark">Home</a> /  <a href="" class="text-dark">Article</a> / <a href="" class="text-dark">Tags</a>  / <a href="" class="text-dark">Franchsie Terbaik</a></p> -->
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
              @foreach ($articles as $article)
                <div class="col-md-4 d-flex align-items-stretch" >
                    <div class="card">
                        <div style="height: 315px; width: 100%; overflow: hidden;">
                            <img src="{{ asset('storage/article/'.$article->thumbnail) }}" class="card-img-top"
                                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <small><b class="text-primary">{{ $article->created_at->format('d F Y') }}</b></small>
                            <h5 class="card-title py-3 fw-bold"><a href="/article/{{ $article->slug }}" >{{ $article->title }}</a></h5>
                            <p class="card-text text-3-line mb-4">{!! Str::limit(strip_tags($article->content), 200) !!}</p>
                            <a href="/article/{{ $article->slug }}" class="btn btn-primary py-2 px-3 mt-auto mb-4" style="width: 150px">VIEW DETAIL</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </section>

@endsection
