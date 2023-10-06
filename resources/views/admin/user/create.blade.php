@extends('layouts.admin')

@section('title-content')
    {{ $title }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">Add User</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add User</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('users.store') }}">
                @csrf
                @method('post')
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"value="{{ old('name') }}"
                            autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}"
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
