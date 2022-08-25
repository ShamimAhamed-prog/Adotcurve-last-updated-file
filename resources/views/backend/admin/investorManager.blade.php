@extends('layouts.adminnav')
@section('investor_manager')
<div class="card shadow mb-12">
<div class="text-right">
        <button type="button" class="btn btn-success addbtn">Add New</button>
    </div>
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @endif
    <div class="card-body">
        <div class="box-header well" data-original-title>
            <h2>
                <i class="icon-user"></i>
                Investor Manager</h2>
        </div>
        <div class="table-responsive">
        <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th class="th-sm">Photo</th>
                        <th class="th-sm">ID</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Phone</th>
                        <th class="th-sm">Experience</th>
                        <th class="th-sm">Self Portfolio</th>
                        <th class="th-sm">Company Name</th>
                        <th class="th-sm">Company Website</th>
                        <th class="th-sm">Company Portfolio</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($investor as $list)
                    <tr>
                      <td><img src="{{ asset('assets/photos/'.$list->photo) }}" width="90px" height="90px" alt="photo"></td>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->designation}}</td>
                        <td>{{$list->company_name}}</td>
                        <td>{{$list->company_website}}</td>
                        <td>{{$list->company_portfolio}}</td>
                        <td>{{$list->company_address}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm btn-rounded editbtn" value="{{$list->id}}">
                                <i class="fas fa-edit"></i></button>
                            <a href="{{route('admin.investor.delete', ['id'=>$list->id])}}" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Are You sure to Delete this'); ">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="editinvestorModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Investor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('update_investor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input class="form-control" type="hidden" name="id" id="edit_id" />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="edit_name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="edit_email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" type="text" name="phone" id="edit_phone">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input class="form-control" type="text" name="designation" id="edit_designation">
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input class="form-control" type="text" name="company_name" id="edit_company_name">
                        </div>
                        <div class="form-group">
                            <label for="company_website">Company Website</label>
                            <input class="form-control" type="text" name="company_website" id="edit_company_website">
                        </div>
                        <div class="form-group">
                            <label for="company_address">Company Address</label>
                            <input class="form-control" type="text" name="company_address" id="edit_company_address">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addinvestorModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Investor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('investor_register')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="name" />
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" name="email" />
                            @error('email')
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
                            <label for="">Designation:</label>
                            <input type="text" class="form-control" name="designation" />
                            @error('designation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" name="password" />
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Company Name:</label>
                            <input type="text" class="form-control" name="company_name" />
                            @error('company_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Company Website:</label>
                            <input type="text" class="form-control" name="company_website" />
                            @error('company_website')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Company Portfolio:</label>
                            <p>N.B: ( Before upload, please rename your documents with your company name)</p>
                            <input type="file" class="form-control" name="company_portfolio" />
                            @error('company_portfolio')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" class="form-control" name="company_address" />
                            @error('company_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Photo:</label>
                            <input type="file" class="form-control" name="photo" />
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptsinvestor')
<script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#editinvestorModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit/investor/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        $("#success_message").html("");
                        $("#success_message").addClass('alert alert-danger');
                        $("#success_message").text(response.message);
                    } else {
                        $('#edit_name').val(response.investor.name)
                        $('#edit_email').val(response.investor.email)
                        $('#edit_phone').val(response.investor.phone)
                        $('#edit_designation').val(response.investor.designation)
                        $('#edit_company_name').val(response.investor.company_name)
                        $('#edit_company_website').val(response.investor.company_website)
                        $('#edit_company_address').val(response.investor.company_address)
                        $('#edit_id').val(id)

                    }
                }
            });
        });
        $(document).on('click', '.addbtn', function(e) {
            e.preventDefault();
            $('#addinvestorModal').modal('show')
        });
    });
</script>
@endsection
