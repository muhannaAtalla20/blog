@extends('admin.layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Update Post</h1>
        </div><!-- /.col -->
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <input type="text" class="form-control mb-3" value="{{ $post->subtitle }}" name="subtitle" placeholder="Subtitle">

                    <textarea class="form-control mb-3" name="content" rows="5" placeholder="Content">{{ $post->content }}</textarea>

                    <input type="file" name="image" class="form-control mb-3">
                    <img width="120" src="{{ asset('upload/'.$post->image) }}" alt="">

                    <select name="category_id" class="form-control mb-3">
                        <option value="" disabled selected>Select Category</option>
                        @foreach($categories as $category)
                            <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-info">
                        Update
                    </button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
</div>
@stop
