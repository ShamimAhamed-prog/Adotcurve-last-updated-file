@extends('layouts.investornav')
@section("investor_profile_content")
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Messages</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Message</h6 >
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table class="table table-bordered table-strip" id="datatable">
                        <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Sender</td>
                            <td>Message</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $key=>$investorMessage)
                            @if($investorMessage->admin_id != null)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $investorMessage->admin->name??'' }}</td>
                                <td>{{ $investorMessage->message }}</td>
                                <td>
                                    @if($investorMessage->is_seen ==true)
                                        <span class="badge badge-success">Seen</span>
                                    @else
                                        <span class="badge badge-danger">Unseen</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('investor.admin.message.conversation',$investorMessage->admin_id) }}">View Conversation</a>
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
