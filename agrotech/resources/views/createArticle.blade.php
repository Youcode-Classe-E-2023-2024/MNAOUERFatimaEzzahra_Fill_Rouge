@extends('layout.app')

@push('css')
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')

<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-2">Creation Articles</h1>

                @if($errors->count())
                    <div class="col-md-12">
                        <div class="alert alert-danger text-center">
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="text-start">
                        <label for="inputCategory">Category</label>
                        <select name="category" id="inputCategory" class="form-control" required>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="text-start">
                        <label for="multiple-select-field-tag" class="form-label">Tag</label>
                        <select name="tags[]" class="form-select" id="multiple-select-field-tag" data-placeholder="Choose anything" required multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="text-start">
                        <label for="title">Title</label>
                        <input name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title article"
                               required>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
{{--                    <div class="form-group mb-2">--}}
{{--                        <label for="desc">Description</label>--}}
{{--                        <div id="editor">--}}
{{--                            <p>This is some sample content.</p>--}}
{{--                        </div>--}}

{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>nn</strong>--}}
{{--                            </span>--}}
{{--                    </div>--}}

                    <div class="text-start">
                        <label for="editor">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor">

                        </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>

                    <div class="text-start">
                        <label for="Upload File/Image">Image</label>
                        <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture" placeholder="Ajouter image"
                               required>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
{{--                    --}}{{--<div class="text-start">--}}
{{--                        <label for="picture">Cover</label>--}}
{{--                        <input type="file" accept="image/*" name="picture" class="form-control is-invalid" id="picture" />--}}

{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>nn</strong>--}}
{{--                            </span>--}}
{{--                    </div>--}}
{{--                    <br>--}}
                    <button type="submit" value="submit" class="btn btn-secondary mb-2">Submit</button>
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
        $('#multiple-select-field-tag').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );

        $('#multiple-select-field-assign').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    </script>
@endpush
