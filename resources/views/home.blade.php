@extends('metronic.master')

@section('content-title')
<h1 class="page-title">
test
<small>off-canvas mobile menu</small>
</h1>
@endsection
@section('content-breadcrumb')
  <div class="page-bar">
      <ul class="page-breadcrumb">
          <li>
              <a href="index.html">Home</a>
              <i class="fa fa-angle-right"></i>
          </li>
          <li>
              <span>Settings</span>
          </li>
      </ul>
  </div>
@endsection
@section('content-body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! ภาษาไทย
                </div>
            </div>
        </div>
    </div>
</div>
@endsection