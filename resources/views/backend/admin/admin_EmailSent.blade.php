@extends('layouts.adminnav')
@section("admin_email")
<div class="container">
  <form action="{{route('admin/email/sent')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">To</span>
      <input type="text" class="form-control" name="user_email" id="" placeholder="Recipient's Email" aria-label="Recipient's Email" aria-describedby="basic-addon2">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">From</span>
      <input type="email" class="form-control" name="email" id="" value="{{ \Auth::guard('admin')->user()->email}}" placeholder="Admin Email" aria-describedby="basic-addon2">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Subject</span>
      <input type="text" class="form-control" placeholder="Subject" aria-label="Subject" aria-describedby="basic-addon2">
    </div>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Text</span>
      </div>
      <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
    <div class="container bg-light">
      <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary">Send</button>
        <button type="button" class="btn btn-danger">Cancel</button>
      </div>
    </div>
</div>
</div>

@endsection