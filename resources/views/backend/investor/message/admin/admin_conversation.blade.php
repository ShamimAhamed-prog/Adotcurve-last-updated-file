@extends('layouts.investornav')
@section("investor_profile_content")
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Messages</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Single Conversation</h6 >
        </div>
        <div class="card-body">
            <div class="row">
                <form  class="user col-lg-12 col-md-12" action="{{ route('investor.admin.message.sendMessage') }}" method="post">
                    @csrf
                    <input type="hidden" name="admin_id" value="{{ $messages[0]->admin_id }}">
                    <input type="hidden" name="investor_id" value="{{ $messages[0]->investor_id }}">
                    <input type="hidden" name="sent_by" value="investor">
                    <div class="container">
                        <h3 class=" text-center">Messaging For Investor To Admin </h3>
                        <div class="messaging">
                            <div class="inbox_msg">
                                <div class="mesgs">
                                    <div class="msg_history">
                                        @foreach($messages as $m)
                                            @if(strcmp($m->sent_by, 'admin'))
                                                <div class="outgoing_msg">
                                                    <div class="sent_msg">
                                                        <p> {{ $m->message }}</p>
                                                        <span class="time_date"> 03:05 AM    |    {{$m->created_at->format("d F")}}</span> </div>
                                                </div>
                                            @else
                                                <div class="incoming_msg">
                                                    <div class="incoming_msg_img"><img class="avatar" src="https://www.w3schools.com/howto/img_avatar.png" alt="Bhargav Raviya"> </div>
                                                    <div class="received_msg">
                                                        <div class="received_withd_msg">
                                                            <p> {{ $m->message }} </p>
                                                            <span class="time_date"> {{$m->created_at->format("h:i A")}}    |    {{$m->created_at->format("d F")}}</span></div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="type_msg">
                                            <div class="input_msg_write">
                                                <input name="message" required type="text" class="write_msg" id="message" placeholder="Type a message" />
                                                <button type="submit" value="Send Message" class="msg_send_btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

@endsection
