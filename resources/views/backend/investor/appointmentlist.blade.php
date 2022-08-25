@extends('layouts.investornav')
@section('investor_Appointmentlist')
<div class="card shadow mb-12">
    <div class="text-left">
     <a href="{{ url('admin/startupFunds/pdf') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Note</th>
                        <th>Status:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->slotdate}}</td>
                        <td>{{$list->timeslot}}</td>
                        <td>{{$list->note}}</td>
                        <td>{{$list->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection


