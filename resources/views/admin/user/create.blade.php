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
                    @include('admin.components.text', [
                        'title' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Password',
                        'name' => 'password',
                        'type' => 'password',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
