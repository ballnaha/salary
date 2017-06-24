@extends('metronic.master') 
@section('content-title')
<h1 class="page-title"><i class="fa fa-money"></i> ค่าตอบแทน</h1>
@endsection 
@section('content-breadcrumb')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('dashboard')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Main</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('main/pay')}}">Pay</a>
        </li>
    </ul>
</div>
@endsection 
@section('content-body')
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <a href="{{url('main/pay/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่ม</a>
    </div>
    <div class="col-lg-6 col-xs-6">
        {{-- <a href="{{ url('tcpdf/report_timeline.php')}}" target="_blank" class="btn dark btn-outline pull-right"><i class="fa fa-print"></i> Print</a> --}}
    </div>
</div>
<br>

@endsection 
@section('footer')

@endsection