@extends('layouts.adminnav')
@section('postadd')
<div class="container">
    <form action="{{route('post_create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-12">
                <div class="form-group">
                    <strong>Category</strong>
                    <select class="form-select" name="c_name" class="form-control " >
                                @foreach($category as $list)
                                    <option value="{{$list->c_name}}">{{$list->c_name}}</option>
                                @endforeach
                            </select>
                    <span class="text-danger">{{ $errors->first('c_name') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Tag Name</strong>
                    <input type="text" name="slug" class="form-control" placeholder="Enter Tag">
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                    <strong>Tag Name</strong>
                   <textarea name="description" id="summernote" class="form-control" ></textarea>
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                </div>
            <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>
            <!-- <div class="col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
            </div> -->
            <div class="col-md-12">
                <strong>Image:</strong>
                <input type="file" class="form-control" name="image" />
                @error('photo')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
           
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>
@endsection
@section('editor_scripts')
<script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 300,
        callbacks: {
        onInit: function (c) {
            c.editable.html('');
        }
    }
      });
    </script>
@endsection