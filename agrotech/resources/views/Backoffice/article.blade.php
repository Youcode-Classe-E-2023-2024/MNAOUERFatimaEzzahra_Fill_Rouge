@extends('layout.admin')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Article</h1>
</div>

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($articles as $article)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold">{{ $article->title }}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">{{ \Illuminate\Support\Str::limit($article->description, 150, $end='...') }}</p>
            </td>


            <td>
                <form action="{{ route('article.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $article->id }}">
                    <button type="submit" class="btn btn-danger btn-sm btn-rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="mt-3">
    {{ $articles->links() }}
</div>
@endsection

@push('js')
@endpush