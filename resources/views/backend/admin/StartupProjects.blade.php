@extends('layouts.adminnav')
@section('startup_projects')
<div class="card shadow mb-12">
    <div class="text-right">
        <button type="button" class="btn btn-success addbtn">Add New</button>
    </div>
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif

        <div class="table-responsive">
        <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID</th>
                        <th class="th-sm">Project Name</th>
                        <th class="th-sm">Type</th>
                        <th class="th-sm">Business Idea</th>
                        <th class="th-sm">Projects Goals</th>
                        <th class="th-sm">Contact Person</th>
                        <th class="th-sm">Phone</th>
                        <th class="th-sm">Startup Name</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($projects as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->p_name}}</td>
                        <td>{{$list->type}}</td>
                        <td>{{$list->business_idea}}</td>
                        <td>{{$list->projects_goal}}</td>
                        <td>{{$list->contact_person}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->s_name}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm btn-rounded editbtn" value="{{$list->id}}">
                                <i class="fas fa-edit"></i></button>
                            <a href="{{route('admin.project.delete', ['id'=>$list->id])}}" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Are You sure to Delete this'); ">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="modal" id="editprojectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Startup Projects</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('update_project')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input class="form-control" type="hidden" name="id" id="edit_id" />
                        <div class="form-group">
                            <label for="p_name">Name</label>
                            <input class="form-control" type="text" name="p_name" id="edit_p_name">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input class="form-control" type="text" name="type" id="edit_type">
                        </div>
                        <div class="form-group">
                            <label for="business_idea">Business Idea</label>
                            <textarea class="form-control" id="edit_business_idea" name="business_idea" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="projects_goal">projects Goal</label>
                            <textarea class="form-control" id="edit_projects_goal" name="projects_goal" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input class="form-control" type="text" name="contact_person" id="edit_contact_person">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" type="text" name="phone" id="edit_phone">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
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
                            <label for="">Startup Name:</label>
                            <select class="form-select" name="s_id" class="form-control " >
                                @foreach($startup as $list)
                                    <option value="{{$list->id}}">{{$list->s_name}}</option>
                                @endforeach
                            </select>
                        </div>
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
                            @error('number')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
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
@section('projects_scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#editprojectModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit/projects/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        $("#success_message").html("");
                        $("#success_message").addClass('alert alert-danger');
                        $("#success_message").text(response.message);
                    } else {
                        $('#edit_p_name').val(response.projects.p_name)
                        $('#edit_type').val(response.projects.type)
                        $('#edit_business_idea').val(response.projects.business_idea)
                        $('#edit_projects_goal').val(response.projects.projects_goal)
                        $('#edit_contact_person').val(response.projects.contact_person)
                        $('#edit_phone').val(response.projects.phone)
                        $('#edit_id').val(id)

                    }
                }
            });
        });
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
