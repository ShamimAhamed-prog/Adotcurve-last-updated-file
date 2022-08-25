@extends('layouts.adminnav')
@section('blogcategories')
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Blog</b>Categories</a>
    </div>
    <div class="card-body">
      <form action="{{route('blog_categories')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
                <label for="">Categories Name:</label>
                  <input type="text"  class="form-control" name="c_name" />
                  @error('c_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                <label for="">Category Description:</label>
                  <input type="text"  class="form-control" name="description" />
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                         <th>Category Name</th>
                         <th> Category Description</th>
                         <th>Created Time</th>
                         <th>Updated Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                         <th>Category Name</th>
                         <th> Category Description</th>
                         <th>Created Time</th>
                         <th>Updated Time</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($category as $list)
                    <tr>
                        <td>{{$list->c_name}}</td>
                        <td>{{$list->description}}</td>
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->updated_at}}</td>
                        <td>
                        <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection