@extends('layouts.adminnav')
@section('appointment_create')
<form action="{{route('addappointment')}}" method="POST">
    @csrf
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
<input name="slotdate" id="slotdate" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" value="2018-05-10 00:00:00" type="date">
<br><br>
<select class="js-example-basic-multiple" name="timeslot[]" multiple="multiple">

 <option value="">Please Select Appointment Time</option>
 <option value="9:30">9:30 AM</option>
 <option value="10:00">10:00 AM</option>
 <option value="10:30">10:30 AM</option>
 <option value="11:30">11:30 AM</option>
 <option value="12:30">12:30 PM</option>
 <option value="13:30">1:30 PM</option>
 <option value="14:30">2:30 PM</option>
 <option value="15:30">3:30 PM</option>
</select>
<br><br>
<input type="submit">
</form> 

<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                         <th>SL</th>
                        <th>Appoinment Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->slotdate}}</td>
                        <td>{{$list->timeslot}}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm btn-rounded">
                                <i class="fas fa-book-open"></i></button>
                            <button type="button" class="btn btn-primary btn-sm btn-rounded editbtn" value="">
                                <i class="fas fa-edit"></i></button>

                            <a href="" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Are You sure to Delete this'); ">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
@section('appointment_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>
    @endsection
@endsection