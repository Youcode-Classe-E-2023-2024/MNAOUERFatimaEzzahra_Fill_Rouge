@extends('layout.app')

@push('css')
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <main class="container pt-4">
        <h1 class="display-2">********</h1>
        <h1 class="display-2">*****</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-dark text-center">Edit Article</h2>

                @if($errors->count())
                    <div class="col-md-12">
                        <div class="alert alert-danger text-center">
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('article.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="text-start">
                        <label for="inputCategory">Category</label>
                        <select name="category" id="inputCategory" class="form-control" required>
                            @foreach($cats as $cat)
                                @if($article->categories_id == ($cat->id))
                                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                @else
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="text-start">
                        <label for="multiple-select-field-tag" class="form-label">Tag</label>
                        <select name="tags[]" class="form-select" id="multiple-select-field-tag" data-placeholder="Choose anything" required multiple>
                            @foreach($tags as $tag)
                                @if($article->tags->contains($tag->id))
                                    <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                @else
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="text-start">
                        <label for="title">Title</label>
                        <input value="{{ $article->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title article"
                               required>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="text-start">
                        <label for="editor">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor">
                            {{ $article->description }}
                        </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <input name="id" type="hidden" value="{{ $article->id }}">
                    <button type="submit" class="btn btn-secondary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>
        $('#multiple-select-field-tag').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });

        $('#multiple-select-field-assign').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endpush
