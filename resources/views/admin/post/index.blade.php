@extends('layouts.admin')

@section('title-content')
    News
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">All News</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All News</h3>
            <div class="card-tools">
                <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Add News</a>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
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
@endpush
