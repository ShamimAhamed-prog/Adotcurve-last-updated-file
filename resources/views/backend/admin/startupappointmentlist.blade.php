@extends('layouts.adminnav')
@section('startup_appointment_list')
<div class="card shadow mb-12">
    <div class="text-left">
     <a href="{{ url('admin/startupFunds/pdf') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
    <div class="table-responsive">
    <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">SL</th>
                        <th class="th-sm">Date</th>
                        <th class="th-sm">Time</th>
                        <th class="th-sm">Booked By</th>
                        <th class="th-sm">Note</th>
                        <th class="th-sm">Status:</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->slotdate}}</td>
                        <td>{{$list->timeslot}}</td>
                        <td>{{$list->s_name}}</td>
                        <td>{{$list->note}}</td>
                        <td>
                        @if($list->status==1)
                        <a>Approved</a>
                        @elseif($list->status==2)
                        <a>Cancel</a>
                        @else
                        <a>Pending</a>
                        @endif
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('approved_startup',$list->id)}}">Approved</a>
                            <a class="btn btn-danger" href="{{url('canceled',$list->id)}}">canceled</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection
@section('startup_appointment_list')
@endsection
