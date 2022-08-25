@extends('layouts.adminnav')
@section("admin_email")
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Messages</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Startup Message</h6 >
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table class="table table-bordered table-strip" id="datatable">
                        <thead>
                        <tr>
                            <td>S/N</td>
                            <td>People</td>
                            <td>Message</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $key=>$startupMessage)
<!--                            --><?php //dd($startupMessage->startup_id); ?>
                        @if($startupMessage->startup_id != null)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($startupMessage->startup !=null)
                                       {{  $startupMessage->startup->s_name }}
                                    @endif
                                </td>
                                <td>{{ $startupMessage->message }}</td>
                                <td>
                                    <a href="{{ route('admin.startup.message.conversation', $startupMessage->startup_id) }}">View Conversation</a>
                                </td>
                            </tr>
                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
