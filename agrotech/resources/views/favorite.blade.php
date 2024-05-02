@extends('layout.app')

@section('content')
<br>
    <!-- Bestsaler Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-2">Best Articles</h1>
        </div>
        <div class="row g-4">

            @foreach($articlefavoris as $articleFavoris )
                <div class="col-lg-6 col-xl-4">
                <div class="p-4 rounded bg-light">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <img src="{{ asset($articleFavoris->article->picture )}}" class="img-fluid rounded-circle" style="width: 150px;height: 150px" alt="">
                        </div>
                        <div class="col-6">
                            <h4>{{ $articleFavoris->article->title }}</h4>
                            <div class="d-flex my-3">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <a href="{{route('Detail.article', $articleFavoris->article->id)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Voir Détail</a>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach

        </div>
    </div>
</div>

@endsection

