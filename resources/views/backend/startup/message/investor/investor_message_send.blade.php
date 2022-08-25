@extends('layouts.startupnav')
@section("startup_profile_content")
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Messages Send Investor</h1>
    @if($message = Session::get('message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6 >
        </div>
        <div class="card-body">
            <form action="{{route('startup.investor.message.store')}}" method="post">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Investor list</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-strip investorTable" id="dataTable" >
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Investor name</th>
                                    <th>Investor Company</th>
                                    <th>Investor Email</th>
                                    <th>Investor Phone</th>
                                    <th class="text-center">
                                        <div class="form-group">
                                            <label class="ui-checkbox ui-checkbox-success btn btn-success">
                                                <input type="checkbox" id="selectAll" >
                                                <span class="input-span"></span>Select All
                                            </label>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($investors as $key=>$investor)
                                    <tr>
                                        <td>{{  $key+1 }}</td>
                                        <td>{{ $investor->name }}</td>
                                        <td>{{ $investor->company_name }}</td>
                                        <td>{{ $investor->email }}</td>
                                        <td>{{ $investor->phone }}</td>
                                        <td>
                                            <input type="checkbox" name="investor_ids[]" class="form-control form-control-sm checkStartup" value="{{ $investor->id}}">
                                        </td>
                                    </tr>

                                @empty
                                    <p>No users</p>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="message_box" style="display: none" @error('message') style="display: none" @enderror>
                    <label for="message" class="font-weight-bold">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required placeholder="Write message"></textarea>
                    @error('message')
                    <span class="d-block text-danger">{{ $message }}</span>
                    @enderror
                    <div class="text-center my-5">
                        <button type="submit" class="btn btn-primary">Message Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Listen for click on toggle checkbox
        $('#selectAll').on('click', function() {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                    var form = $('#message_box').show(500);
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                    var form = $('#message_box').hide(300);
                });
            }
        });
        $('.investorTable').on("change", ".checkStartup", function (event) {

            var status = $('.investorTable :input[type="checkbox"]:checked').length;

            if (status > 0) {
                var form = $('#message_box').show(500);
            }
            else {
                var form = $('#message_box').hide(300);
            }
        });
    </script>

@endsection


