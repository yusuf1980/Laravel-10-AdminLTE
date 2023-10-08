@extends('layouts.admin')

@section('title-content')
    News
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">All News</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('posts.edit', $post->id) }}">Edit News</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit News</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-md-12">
                    @include('admin.components.text', [
                        'title' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'item' => $post->title,
                    ])
                </div>
                <div class="col-md-4">
                    @include('admin.components.select', [
                        'title' => 'Status',
                        'name' => 'status',
                        'data' => ['Draft' => '0', 'Publish' => '1'],
                        'item' => (string) $post->published,
                    ])
                </div>
                <div class="col-md-4">
                    @include('admin.components.select', [
                        'title' => 'Category',
                        'name' => 'category_id',
                        'data' => $categories,
                        'item' => $post->category_id,
                    ])
                </div>
                <div class="col-md-4">
                    @include('admin.components.date', [
                        'title' => 'Published Date',
                        'name' => 'published_date',
                        'type' => 'text',
                        'id' => 'date',
                        'item' => $post->published_date,
                    ])
                </div>
                <div class="col-md-12">
                    @include('admin.components.textarea', [
                        'title' => 'Summary',
                        'name' => 'summary',
                        'item' => $post->summary,
                    ])
                </div>
                <div class="col-md-12">
                    @include('admin.components.contentarea', [
                        'title' => 'Content',
                        'name' => 'content',
                        'item' => $post->content,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.image', [
                        'title' => 'Feature Image',
                        'name' => 'image',
                        'type' => 'file',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @if($post->image)
                    <img src="{{ asset('images/posts/'.$post->image)}}" style="width: 300px; border: 5px solid #eee"  />
                    <button type="button" class="btn btn-danger" onclick="removeImage()">Remove Image</button>
                    @else
                    No Image
                    @endif
                </div>
                <div class="col-md-12 py-4">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </div>
            </form>
            <form method="post" action="{{route('posts.deleteimage', $post->id)}}" id="remove-image">
                @csrf
                @method('post')
            </form>
        </div>
    </div>
@endsection

@push('js')
<script>

function removeImage() {
    const imgForm = document.getElementById('remove-image');
    imgForm.submit();
    console.log(imgForm);
}
</script>
@endpush


