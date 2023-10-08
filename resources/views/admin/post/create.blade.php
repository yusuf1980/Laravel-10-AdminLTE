@extends('layouts.admin')

@section('title-content')
    News
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">All News</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('posts.create') }}">Add News</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add News</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="col-md-12">
                    @include('admin.components.text', [
                        'title' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-4">
                    @include('admin.components.select', [
                        'title' => 'Status',
                        'name' => 'status',
                        'data' => ['Draft' => '0', 'Publish' => '1'],
                        'item' => null,
                    ])
                </div>
                <div class="col-md-4">
                    @include('admin.components.select', [
                        'title' => 'Category',
                        'name' => 'category_id',
                        'data' => $categories,
                        'item' => null,
                    ])
                </div>
                <div class="col-md-4">
                    @include('admin.components.date', [
                        'title' => 'Published Date',
                        'name' => 'published_date',
                        'type' => 'text',
                        'id' => 'date',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-12">
                    @include('admin.components.textarea', [
                        'title' => 'Summary',
                        'name' => 'summary',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-12">
                    @include('admin.components.contentarea', [
                        'title' => 'Content',
                        'name' => 'content',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-5">
                    @include('admin.components.image', [
                        'title' => 'Feature Image',
                        'name' => 'image',
                        'type' => 'file',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-12 py-4">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection


