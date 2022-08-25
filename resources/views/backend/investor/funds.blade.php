@extends('layouts.investornav')
@section('investor_fund_manager')
<div class="card shadow mb-12">
    <div class="text-right">
        <button type="button" class="btn btn-success addbtn">Raise New Funds</button>
    </div>
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
   
        <div class="table-responsive">
            <h3>Fund Request Data</h3>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Investor Name</th>
                        <th>Total Amount</th>
                        <th>Percentage</th>
                        <th>Startup Name:</th>
                        <th>Status:</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>Investor Name</th>
                    <th>Total Amount</th>
                    <th>Percentage</th>
                    <th>Startup Name:</th>
                    <th>Status:</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($funds as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->inv_name}}</td>
                        <td>{{$list->f_ammount}}</td>
                        <td>{{$list->percentage}}</td>
                        <td>{{$list->s_name}}</td>
                        <td>{{$list->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Raise New Fund</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('investor_raise_fund')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="">Investor Name:</label>
                        <select class="form-select" name="inv_name" class="form-control " >
                            @foreach($investor as $list)
                            <option value="{{ \Auth::guard('investor')->user()->id}}">{{ \Auth::guard('investor')->user()->name}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="f_ammount">Ammount:</label>(BDT)
                            <input type="number" class="form-control" name="f_ammount" />
                            <!-- @error('f_ammount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror -->
                        </div>
                        <div class="form-group">
                            <label for="business_idea">Fund Description:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                            <!-- @error('business_idea')
                            <span class="text-danger">{{$message}}</span>
                            @enderror -->
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="table-responsive">
    <h3>New Raised Fund Data</h3>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total Amount</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                         <th>ID</th>
                        <th>Total Amount</th>
                        <th>Description</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($raisedfunds as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->f_ammount}}</td>
                        <td>{{$list->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection
@section('Raisefund_scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.addbtn', function(e) {
            e.preventDefault();
            $('#addModal').modal('show')
        });
    });

</script>
@endsection