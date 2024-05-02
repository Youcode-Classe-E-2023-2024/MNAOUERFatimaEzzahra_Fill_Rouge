@extends('layout.app')

@section('content')

<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h5 class="mb-5 display-3 text-primary">L'agrotechnologie</h5>
                <h4 class="mb-3 text-secondary">Représente l'application des technologies de pointe dans le
                    domaine de l'agriculture pour améliorer l'effi cacité, la durabilité et la productivité des
                    pratiques agricoles.</h4>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="img/photo3.jpg" class="img-fluid w-100 h-200 bg-secondary rounded" alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Matériel</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="img/plante.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Fertilisation</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="img/cereal.jpg" class="img-fluid w-100 h-400 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Cultive</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="img/irrigation.jpg" class="img-fluid w-100 h-400 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Irrigation</a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Article Tendance</h1>
                </div>
            </div>
            <div class="tab-content py-1">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach($articlesTendance as $tendance)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset($tendance->picture)}}" class="img-fluid w-100 rounded-top" alt="" style="height: 200px; object-fit: cover;">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $tendance->category->name}}
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $tendance->title}}</h4>
                                                <p class="card-text mb-auto text-muted" style="max-height: 3.2em; overflow: hidden;">{!! nl2br(substr($tendance->description, 100)) !!}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <a href="{{ route('Detail.article', ['id' => $tendance->id]) }}" class="btn border border-secondary rounded-pill px-3 text-primary">
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

<!-- Vesitable Shop Start-->
<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <div class="col-lg-4 text-start">
            <h1 class="mb-0">Nouveau Article</h1>
        </div>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            @foreach($articlesTendance as $tendance)
            <div clss="col-md-6 col-lg-4 col-xl-3">
                <div class="rounded position-relative fruite-item">
                    <div class="fruite-img">
                        <img src="{{asset($tendance->picture)}}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $tendance->category->name}}
                    </div>
                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                        <h4>{{ $tendance->title}}</h4>
                        <p class="card-text mb-auto text-muted" style="max-height: 3.2em; overflow: hidden;">{!! nl2br(substr($tendance->description, 100)) !!}</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <a href="{{ route('Detail.article', ['id' => $tendance->id]) }}" class="btn border border-secondary rounded-pill px-3 text-primary">
                                Voir Plus</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Vesitable Shop End -->
@endsection
