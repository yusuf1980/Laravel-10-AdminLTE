@extends('layouts.admin')

@section('title-content')
Dashboard
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Home</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      Start creating your amazing application!
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
