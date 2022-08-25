@extends('layouts.adminnav')
@section("admin_email")
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Messages Send to Startups</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6 >
        </div>
        <div class="card-body">

            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active font-18 font-weight-bold" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Send Message to Investors</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link font-18 font-weight-bold" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Send Message to Startups</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p4" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{route('admin.message.store')}}" method="post">
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Startups</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-strip investorTable" id="dataTable" >
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Startup's name</th>
                                            <th>Startup's Email</th>
                                            <th>Startup's Phone</th>
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
                                                <td>{{ $investor->company_name }}</td>
                                                <td>{{ $investor->name }}</td>
                                                <td>{{ $investor->email }}</td>
                                                <td>{{ $investor->phone }}</td>
                                                <td>
                                                    <input type="checkbox" name="investor_ids[]" class="form-control form-control-sm checkInvestor" value="{{ $investor->id}}">
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>

            </div>

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

        $('.investorTable').on("change", ".checkInvestor", function (event) {

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


