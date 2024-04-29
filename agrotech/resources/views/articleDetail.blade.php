@extends('layout.app')

@push('css')
    <style>
        .detailBox {
            margin-top: 20px;
            border:1px solid #bbb;
        }
        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width:80%;
        }
        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width:18%;
        }
        .actionBox .form-group * {
            width:100%;
        }
        .taskDescription {
            margin-top:10px 0;
        }
        .commentList {
            padding:0;
            list-style:none;
            max-height:200px;
            overflow:auto;
        }
        .commentList li {
            margin:0;
            margin-top:10px;
        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p {
            margin:0;
        }
        .sub-text {
            color:#aaa;
            font-family:verdana;
            font-size:11px;
        }
        .actionBox {
            border-top:1px dotted #bbb;
            padding:10px;
        }
        .enlarged-icon {
            font-size: 50px; /* Adjust the size as needed */
        }
    </style>
@endpush

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
                                <img src="{{asset($article->picture)}}" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="fw-bold mb-3">{{$article->title}}</h5>
                        <p class="fw-bold mb-3">{{ date('d-M-y', strtotime($article->created_at)) }} by <a href="#">{{ $article->user->name }}</a></p>
                        <p class="mb-4">{!! nl2br($article->description) !!}</p>

                        <form class="form-inline" role="form" action="{{ route('favorite.article') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $article->id }}" name="articleId">
                            @auth
                                @if(\App\Models\Articlefavoris::isFavoris(auth()->id(), $article->id))
                                    <i class="fas fa-thumbs-up enlarged-icon" style="color: #3d75d6;"></i>
                                @else()
                                    <button type="submit" class="btn btn-link">
                                        <i class="fas fa-thumbs-up enlarged-icon" style="color: #A9A9A9;"></i>
                                    </button>
                                @endif
                            @endauth

                        </form>

                    </div>

                    <div class="row">
                        <div class="detailBox">
                            <div class="titleBox">
                                <label>Comments</label>
                            </div>

                            <div class="actionBox">
                                <ul class="commentList">
                                    @foreach($article->comments as $comment)
                                        <li>
                                            <div class="commenterImage">
                                                <img src="{{asset('img/avatar_comment.jpg')}}" />
                                            </div>
                                            <div class="commentText">
                                                <p class="">{{ $comment->content }}</p> <span class="date sub-text">on March 5th, 2014</span>
                                            </div>
                                        </li>
                                    <form class="form-inline" role="form" action="{{ route('delete.comment', ['id' => $comment->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button name="delete" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                    @endforeach
                                </ul>
                                <form class="form-inline" role="form" action="{{ route('add.comment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $article->id }}">

                                    <div class="form-group">
                                        <input name="content" class="form-control" type="text" placeholder="Your comments" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <div class="pb-3 mt-5">
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
