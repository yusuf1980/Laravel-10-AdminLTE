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
            <h3 class="card-title">Edit Category</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('categories.update', [$category->id]) }}">
                @csrf
                @method('put')
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Category Name',
                        'name' => 'name',
                        'type' => 'text',
                        'item' => $category->name,
                    ])
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
