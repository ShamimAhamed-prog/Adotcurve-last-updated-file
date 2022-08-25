@extends('layouts.startupnav')
@section('book_appoinment')
@if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
<form action="" method="POST">
    @csrf
    <div class="text-center">
        <h4>Please Select a Date First</h4></div>
        <div class="text-center">
 <input type ="date" name="slotdate">
</div>
    <br>
    <div class="text-center">
    <button type="submit"  class="btn btn-primary" value="Find">Find Time</button>
    </div>
  <!-- <input type="submit" value="Find"> -->
 </form>
 <br />
 <br />
 <br />     
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
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->slotdate}}</td>
                        <td>{{$list->timeslot}}</td>
                        <td>
                        <button type="button" class="btn btn-primary btn-sm btn-rounded addbtn" value="{{$list->id}}">
                                <i class="fas fa-edit">Book</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @foreach($data as $list)
        <div class="modal" id="addNote">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Some Note Here....</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                        <form action="{{route('startup_Appointment_book')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" name="book_id" id="id" />
                            <div class="form-group">
                            <input type="hidden" class="form-control" value="{{ \Auth::guard('startup')->user()->id}}" name="s_id" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="note">Notes:</label>
                                <textarea type="text" class="form-control" name="note"></textarea> 
                            </div>
                            <div class="form-group">
                                <label for="date">Dates:</label>
                                <input type="text" class="form-control" id="slotdate" name="slotdate" readonly />
                            </div>
                            <div class="form-group">
                                <label for="time">Time:</label>
                                <input type="text" class="form-control" id="timeslot" name="timeslot" readonly />
                            </div>
                        
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
@section('book_appointment_scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.addbtn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#addNote').modal('show')
            $.ajax({
                type: "GET",
                url: "/book/appointment/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        $("#success_message").html("");
                        $("#success_message").addClass('alert alert-danger');
                        $("#success_message").text(response.message);
                    } else {
                        $('#slotdate').val(response.data.slotdate)
                        $('#timeslot').val(response.data.timeslot)
                        $('#id').val(id)
                    }
                }
            });
        });
    });
</script>
@endsection