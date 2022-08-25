@extends('layouts.adminnav')
@section('appointmentcopy_create')
<style>
    .selected {
     color: red;
    padding: 5px;
    border: 1 px solid #666666;
    cursor: pointer;
}
.selected:hover {
  background-color: #0066CC;
  color: #000000;
}
</style>
    <div class="row">
    Date: <div id="datepicker" ></div>
    </div>
    <div class="form-group">
  <div class="container-fluid px-0 px-sm-4 mx-auto">
  <div class="row justify-content-center mx-0">
    <div class="col-lg-10">
      <div class="card border-0">
          <h6>Create Appointment Time Slots
            <br> (Please Select A Date)</h6>
          <div class="card-body" id="timeslot" style="display:none">
          <table id="uploads_approval" border="5" cellspacing="0" align="center">
            <tbody>
        <tr>
          <td align="center" height="50"
                width="100"><b>9:20</b></td>
        </tr>   
        <tr>
          <td align="center" height="50"
                width="100"><b>10:00</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>10:20</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>11:00</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>11:20</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>12:00</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>12:20</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>13:00</b></td>
        </tr> 
        <tr>
          <td align="center" height="50"
                width="100"><b>13:20</b></td>
        </tr> 
        </tbody>
    </table>
    <input type="text" id="selectedRows">
    <button class="btn btn-success btn-submit">Submit</button>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                         <th>SL</th>
                        <th>Appoinment Date</th>
                        <th>Time</th>
                        <th>Booked By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->date}}</td>
                        <td>{{$list->time}}</td>
                        <td>{{$list->bookedby}}</td>
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
@endsection
@section('appointmentcopy_scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</script>
  <script>
    $(document).ready(function(){
});

$(function() {
  $("#datepicker").datepicker();
  $("#datepicker").on("change", function() {
    var date = $(this).val();
    document.getElementById("timeslot").style.display = "";
  });

});
$('#uploads_approval tr').click(function(){
$(this).toggleClass('selected');
var time = [];
$('.selected').each(function() {         
  time.push($(this).text());
});
console.log(time);

$('#selectedRows').val(time);

$(".btn-submit").click(function(e){

e.preventDefault();

var date = $(this).serialize();

var url = "{{ url('appointmentadd')}}";
$.ajax({
           url:url,
           method:'POST',
           data:date,time,
           success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
      });

});
  </script>
</html>
@endsection