@extends('layout.app')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5 custom-height">
    <h1 class="text-center text-white display-6 mt-5">Article Detail</h1>
</div>
<!-- Single Page Header End -->


<!-- Single Product Start -->
<div class=mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="{{asset('img/single-item.jpg')}}" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="fw-bold mb-3">{{$article->title}}</h5>
                        <p class="fw-bold mb-3">{{ date('d-M-y', strtotime($article->created_at)) }} by <a href="#">{{ $article->user->name }}</a></p>
                        {{--                        <p class="mb-3">Category: Vegetables</p>--}}
{{--                        <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>--}}
                        <p class="mb-4">{!! nl2br($article->description) !!}</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="tab-content mb-5">
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="{{asset('img/avatar.jpg')}}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="{{asset('img/avatar.jpg')}}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <a href="{{route('favorite.article')}}" type="submit" class="btn btn-info">Like</a>
                                <a type="button" class="btn btn-danger">Dislike</a>
                            </div>
                            <h5 class="mb-5 fw-bold">Laisser un Commentaire</h5>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8" placeholder="Commentaire *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <div class="pb-3">
{{--                                    @auth--}}
{{--                                        @if(auth()->user()->id == $article->created_by)--}}
                                            <a class="btn btn-sm btn-primary" href="{{ route('article.edit', $article->id) }}">Edit</a>
                                            <a onclick="deleteModal.showModal();" class="btn btn-sm btn-danger">Delete</a>
{{--                                        @endif--}}
                                </div>
                                <h3 class="text-secondary fw-bold">Tag</h3>
                                <h3 class="text-secondary fw-bold">Last Article</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <dialog id="deleteModal">
        <p>Are you sure ?</p>
        <form action="{{ route('article.destroy') }}" method="POST">
            @csrf
            <button name="delete" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            <input type="hidden" name="id" value="{{ $article->id }}">
            <a onclick="deleteModal.close()" class="btn btn-sm btn-secondary">Cancel</a>
        </form>
    </dialog>

@endsection
