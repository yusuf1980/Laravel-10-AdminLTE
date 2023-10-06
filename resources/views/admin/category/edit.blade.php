@extends('layouts.admin')

@section('title-content')
    Categories
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.edit', [$category->id]) }}">Edit Category</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('categories.update', [$category->id]) }}">
                @csrf
                @method('put')
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"value="{{ $category->name }}"
                            autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
