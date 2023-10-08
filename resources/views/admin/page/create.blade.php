@extends('layouts.admin')

@section('title-content')
    Page
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('pages.create') }}">Add Page</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Page</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('pages.store') }}">
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
                <div class="col-md-12">
                    @include('admin.components.contentarea', [
                        'title' => 'Content',
                        'name' => 'content',
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
