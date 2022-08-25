@extends('layouts.adminnav')
@section('bloglist')
<div class="card-body">
        <div class="table-responsive">
        <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                         <th class="th-sm">Photo</th>
                         <th class="th-sm">Category Name</th>
                         <th class="th-sm">Ttile</th>
                         <th class="th-sm">Tag Name</th>
                         <th class="th-sm">Status</th>
                         <th class="th-sm">Created Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $list)
                    <tr>
                        <td><img src="{{ asset('assets/blog/'.$list->image) }}" width="90px" height="90px" alt="image"></td>
                        <td>{{$list->c_name}}</td>
                        <td>{{$list->title}}</td>
                        <td>{{$list->slug}}</td>
                        <td>{{$list->status}}</td>
                        <td>{{$list->created_at}}</td>
                        <td>
                        <a class="btn btn-success" href="{{url('active',$list->id)}}">Active</a>
                        </td>
                        <td>
                        <a class="btn btn-danger" href="{{url('deactive',$list->id)}}">Deactive</a>
                        </td>
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