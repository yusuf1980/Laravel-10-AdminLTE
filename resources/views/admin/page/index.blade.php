@extends('layouts.admin')

@section('title-content')
    Page
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Pages</h3>
            <div class="card-tools">
                <a href="{{ route('pages.create') }}" class="btn btn-success btn-sm">Add Page</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0">{{ $page->title }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('pages.edit', [$page->id]) }}"
                                            class="btn btn-info btn-sm mr-2">Edit</a>
                                        <form method="post" class="d-inline"
                                            action="{{ route('pages.destroy', [$page->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="btnDelete()"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function btnDelete() {
        event.preventDefault()
        var form = event.target.form; // storing the form
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
</script>
@endsection
