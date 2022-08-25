@extends('layouts.startupnav')
@section('startup_profile_content')
<div class="container">
  <div class="row align-items-center flex-row-reverse">
    <div class="col-lg-6">
      <div class="about-text go-to">
        <h3 class="dark-color"> {{ \Auth::guard('startup')->user()->s_name}} </h3>
        <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6>
        <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>
        <div class="row about-list">
          <div class="col-md-6">
            <div class="media">
              <label>E-mail :</label>
              <p>{{ \Auth::guard('startup')->user()->email}}</p>
            </div>
            <div class="media">
              <label>Phone :</label>
              <p>{{ \Auth::guard('startup')->user()->phone}}</p>
            </div>
            <div class="media">
              <label>Address :</label>
              <p>{{ \Auth::guard('startup')->user()->address}}</p>
            </div>
            <div class="media">
              <label>Company Name :</label>
              <p>{{ \Auth::guard('startup')->user()->company_name}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="about-avatar">
      <img src="{{ asset('public/assets/photos/1652684692.png')}}" style="width:315px; height:315px; float:left; border-radius:50%; margin-right:25px;" alt="photo"/>
      </div>
    </div>
  </div>
  <div class="counter">
    <div class="row">
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="500" data-speed="500">500</h6>
          <p class="m-0px font-w-600">Happy Clients</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="150" data-speed="150">150</h6>
          <p class="m-0px font-w-600">Project Completed</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="850" data-speed="850">850</h6>
          <p class="m-0px font-w-600">Photo Capture</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="190" data-speed="190">190</h6>
          <p class="m-0px font-w-600">Telephonic Talk</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection