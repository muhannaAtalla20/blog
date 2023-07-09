@extends('admin.layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Add New Categry</h1>
        </div><!-- /.col -->
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control mb-3" name="name" placeholder="Category Name">
                    <button class="btn btn-success">
                        Save
                    </button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
</div>
@stop
