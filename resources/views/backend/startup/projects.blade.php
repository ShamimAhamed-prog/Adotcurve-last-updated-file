@extends('layouts.startupnav')
@section('startup_project_manager')
<div class="card shadow mb-12">
    <div class="text-right">
        <button type="button" class="btn btn-success addbtn">Add New</button>
    </div>
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
                        <td>
                            <button type="button" class="btn btn-info editbtn" value="{{$list->id}}">
                                Edit</button>
                            <button type="button" class="btn btn-danger">
                                Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- Startup add -->

    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Projects</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('startup_projects_register')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Projects Name:</label>
                            <input type="text" class="form-control" name="p_name" />
                            @error('p_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <input type="text" class="form-control" name="type" />
                            @error('type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="business_idea">Business Idea:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="business_idea" rows="3"></textarea>
                            @error('business_idea')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="projects_goal">Projects Goal:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="projects_goal" rows="3"></textarea>
                            @error('projects_goal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Contact Person:</label>
                            <input type="text" class="form-control" name="contact_person" />
                            @error('contact_person')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone:</label>
                            <input type="number" class="form-control " name="phone" />
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Startup Name:</label>
                            <input type="text" class="form-control" value="{{ \Auth::guard('startup')->user()->s_name}}" name="s_name"readonly />
                        </div>
                        <div class="form-group">
                            <label for="">ID:</label>
                            <input type="text" class="form-control" value="{{ \Auth::guard('startup')->user()->id}}" name="s_id" readonly/>
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
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // $(document).on('click', '.editbtn', function(e) {
        //     e.preventDefault();
        //     var id = $(this).val();
        //     $('#editModal').modal('show');
        //     $.ajax({
        //         type: "GET",
        //         url: "/edit/startup/" + id,
        //         success: function(response) {
        //             if (response.status == 404) {
        //                 $("#success_message").html("");
        //                 $("#success_message").addClass('alert alert-danger');
        //                 $("#success_message").text(response.message);
        //             } else {
        //                 $('#edit_s_name').val(response.startup.s_name)
        //                 $('#edit_email').val(response.startup.email)
        //                 $('#edit_phone').val(response.startup.phone)
        //                 $('#edit_experienced').val(response.startup.experienced)
        //                 $('#edit_company_name').val(response.startup.company_name)
        //                 $('#edit_company_website').val(response.startup.company_website)
        //                 $('#edit_address').val(response.startup.address)
        //                 $('#edit_id').val(id)

        //             }
        //         }
        //     });
        // });
        $(document).on('click', '.addbtn', function(e) {
            e.preventDefault();
            $('#addModal').modal('show')
        });
    });



    // $(document).on('click', '.update_startup', function(e) {
    //     e.preventDefault();
    //     var id = $('edit_id').val();
    //     var data={
    //         's_name' : $('#edit_s_name').val(),
    //         'email' : $('#edit_email').val(),
    //         'phone' : $('#edit_phone').val(),
    //         'experienced' : $('#edit_experienced').val(),
    //         'company_name' : $('#edit_company_name').val(),
    //         'company_website' : $('#edit_company_website').val(),
    //         'address' : $('#edit_address').val(),
    //     }
    //     $.ajax({
    //             type: "PUT",
    //             url: "/update_startup/" + id,
    //             data: data,
    //             dataType:"json",
    //             success: function(response) {
    //                 console.log(response);
    //             }
    //     });
    // });
</script>
@endsection
