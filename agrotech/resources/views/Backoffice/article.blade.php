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
            <th>Status</th>
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
                <form action="" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="">
                    <td>
                        <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="pending">Pending</option>
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </td>

                    <td>
                        <button type="submit" class="btn btn-link btn-sm btn-rounded">Save</button>
{{--                        <a class="btn btn-link btn-sm text-secondary" href="">Details</a>--}}
                    </td>
                </form>
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
