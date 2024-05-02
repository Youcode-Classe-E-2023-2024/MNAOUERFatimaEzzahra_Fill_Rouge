@extends('layout.app')

@section('content')
    <main class="container pt-4" style="margin-top: 170px">
        <div class="row g-5">
            <div class="col-md-8">
{{--                @role('admin|organizer')--}}
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Articles
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['totalArticles'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user-group"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Article Favoris
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['totalLiked'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-regular fa-rectangle-list"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-md-4">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary">{{ $article->category->name }}</strong>
                                    <div class="fruite-img">
                                        <img src="{{asset($article->picture)}}" class="img-fluid w-100 rounded-top"
                                             alt="">
                                    </div>
                                    <h3 class="mb-0">{{ $article->title }}</h3>
                                    <div class="mb-1 text-muted">{{ date('d M y', strtotime($article->created_at)) }}</div>
                                    <p class="card-text mb-auto text-muted"style="max-height: 3.2em; overflow: hidden;">{{ ucfirst($article->description) }}</p>
                                    <a href="{{ route('Detail.article', $article->id) }}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 bg-light rounded">
                        <h5>{{$user->name}}</h5>
                        <p>{{$user->email}}</p>
                        <a href="{{ route('logout') }}">
                            <span type="submit" class="btn btn-sm btn-outline-secondary">Logout</span>
                        </a>
                        <!-- <form>
                            <btn></btn>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
