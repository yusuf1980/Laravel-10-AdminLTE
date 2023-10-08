@extends('layouts.admin')

@section('title-content')
    Categories
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <div class="card-body">
                        <form class="g-3 mx-3 row" method="post" action="{{ route('categories.store') }}">
                            @csrf
                            @method('post')
                            <div class="col-md-12">
                                @include('admin.components.text', [
                                    'title' => 'Category Name',
                                    'name' => 'name',
                                    'type' => 'text',
                                    'item' => null
                                ])
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Categories</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="{{ route('categories.edit', [$item->id]) }}"
                                                        class="btn btn-info btn-sm mr-2">Edit</a>
                                                    <form method="post" class="d-inline"
                                                        action="{{ route('categories.destroy', [$item->id]) }}">
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
                            <div class="pagination px-3 py-4">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
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
