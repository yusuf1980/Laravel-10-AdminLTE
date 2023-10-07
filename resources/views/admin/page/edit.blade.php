@extends('layouts.admin')

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('title-content')
    Page
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('pages.create') }}">Edit Page</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Page</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('pages.store') }}">
                @csrf
                @method('post')
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="title"
                            class="form-control @error('title') is-invalid @enderror"value="{{ $page->title }}"
                            autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Content</label>
                        <div id="editor">
                            {!! $page->content !!}
                        </div>
                        <textarea id="detail" style="display: none" name="content"
                            class="form-control @error('content') is-invalid @enderror">{{ $page->content }}</textarea>
                        @error('content')
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

@section('js')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="{{asset('assets/quill-image-resize-module.min.js')}}"></script>

    <script>
        var toolbarOptions = ['bold', 'italic', 'underline', 'strike'];
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                imageResize: {},
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'align': []
                    }],
                    ['link', 'image'],
                ]
            }
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            $('#detail').val(quill.container.firstChild.innerHTML);
        })
    </script>
@endsection
