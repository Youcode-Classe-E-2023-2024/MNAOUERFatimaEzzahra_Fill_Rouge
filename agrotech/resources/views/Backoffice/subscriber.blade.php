@extends('layout.admin')

@push('css')
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Subscriber</h1>
    </div>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Status</th>
{{--            <th>Actions</th>--}}
        </tr>
        </thead>
        <tbody>

        @foreach($subscribers as $subscriber)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold">{{ $subscriber->id }}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">{{ $subscriber->email }}</p>
            </td>
            <td>
                <p class="fw-normal">{{ $subscriber->status }}</p>
            </td>
{{--            <form action="" method="POST">--}}
{{--                @csrf--}}

{{--                <input type="hidden" name="id" value="">--}}
{{--                <td>--}}
{{--                    <select id="role" name="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                        <option value="user">User</option>--}}
{{--                        <option value="organizer">Autheur</option>--}}
{{--                        <option value="admin">Admin</option>--}}
{{--                    </select>--}}
{{--                </td>--}}

{{--                <td>--}}
{{--                    <button type="submit" class="btn btn-link btn-sm btn-rounded">Assign</button>--}}
{{--                </td>--}}
{{--            </form>--}}
        </tr>
                @endforeach
        </tbody>
    </table>
    <div class="mt-3">
                {{ $subscribers->links() }}
    </div>
@endsection

@push('js')
@endpush
