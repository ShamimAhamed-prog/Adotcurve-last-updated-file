@extends('layouts.investornav')
@section('investor_projects')
<div class="card shadow mb-12">
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
   
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Type</th>
                        <th>Business Idea</th>
                        <th>Projects Goals</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>Startup Name</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Type</th>
                        <th>Business Idea</th>
                        <th>Projects Goals</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>Startup Name</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($project as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->p_name}}</td>
                        <td>{{$list->type}}</td>
                        <td>{{$list->business_idea}}</td>
                        <td>{{$list->projects_goal}}</td>
                        <td>{{$list->contact_person}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->s_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection