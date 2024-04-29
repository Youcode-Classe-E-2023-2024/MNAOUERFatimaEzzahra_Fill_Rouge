@extends('layout.app')

@section('content')

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-12 text-center">
                        <h1 class="display-2">tous les Articles</h1>
                    </div>
                </div>
                <div class="tab-content py-1">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach($articles as $article )
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset($article->picture)}}" style="width: 296px; height: 198px" class="img-fluid w-100 rounded-top"
                                                     alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                 style="top: 10px; left: 10px;">{{$article->category->name}}
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{$article->title}}</h4>
                                                <div style="max-height: 7em; overflow: hidden;">
                                                    <p >{!! nl2br($article->description) !!}</p>
                                                </div>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <a href="{{route('Detail.article', $article->id)}}"
                                                       class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        Voir Plus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
    <div class="mt-3">
        {{ $articles->links() }}
    </div>
@endsection
