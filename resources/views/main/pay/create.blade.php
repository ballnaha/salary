@extends('metronic.master') 
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
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Create</span>
        </li>
    </ul>
</div>
@endsection 
{{-- @section('content-title')
<h1 class="page-title"><i class="fa fa-money"></i> ค่าตอบแทน</h1>
@endsection  --}}
@section('content-body')

<div class="portlet-title">
    <div class="caption">
        <span class="caption-subject font-red-flamingo bold uppercase"><i class="fa fa-money"></i> ค่าตอบแทน</span>
    </div>
</div>
<div class="portlet-body form">
<form class="form-horizontal" role="form" method="POST" action="{{url('main/pay')}}" data-parsley-validate="" enctype="multipart/form-data" id="myform" novalidate="">
{{ csrf_field() }}
    <div class="row">
        <div class="form-group">
        <div class="col-lg-2"> <label for="" class="control-label col-lg-12"><strong>วันที่ </strong> <span class="required">*</span></label></div>
        <div class="col-lg-2">
<div class="input-group date date-picker startDate" data-date-format="yyyy/mm/dd">
    <input type="text" name="startdate" class="form-control" readonly="" data-parsley-required-message="เลือกวันที่" data-parsley-trigger="change focusout" placeholder="" data-parsley-errors-container="#startdate-required" required>
    <span class="input-group-btn">
        <button class="btn default" type="button">
        <i class="fa fa-calendar"></i>
        </button>
    </span>
</div>
<div id="startdate-required" class="validate-message"></div>
        </div>

        <div class="col-lg-2">
            <label for="" class="control-label col-lg-12"><strong>จำนวนผู้ป่วยรอบเช้า </strong> <span class="required">*</span></label>
        </div>
        <div class="col-lg-2">
            <input type="number" name="pateint1" value="0" class="form-control" data-parsley-required-message="กรอกจำนวนผู้ป่วยรอบเช้า" data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#pateint1-required" required>
            <div class="validate-message" id="pateint1-required"></div>
        </div>            
        </div>

</div>
<br>
<div class="row">
    <div class="form-group">
        <div class="col-lg-2">
            <label for="" class="control-label col-lg-12"><strong>จำนวนผู้ป่วยรอบบ่าย </strong> <span class="required">*</span></label>
        </div>
        <div class="col-lg-2">
            <input type="number" name="pateint2" value="0" class="form-control" data-parsley-required-message="กรอกจำนวนผู้ป่วยรอบบ่าย" data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#pateint2-required" required>
            <div class="validate-message" id="pateint2-required"></div>
        </div>

        <div class="col-lg-2">
            <label for="" class="control-label col-lg-12"><strong>จำนวนผู้ป่วยรอบเย็น </strong> <span class="required">*</span></label>
        </div>
        <div class="col-lg-2">
            <input type="number" name="pateint3" value="0" class="form-control" data-parsley-required-message="กรอกจำนวนผู้ป่วยรอบเย็น" data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#pateint3-required" required>
            <div class="validate-message" id="pateint3-required"></div>
        </div>
    </div>
</div>
    <br>
<div class="row">
    <div class="form-group">
        <div class="col-lg-2">
            <label for="" class="control-label col-lg-12"><strong>เจ้าหน้าที่ </strong> <span class="required">*</span></label>
        </div>
        <div class="col-lg-2">
            <select name="emp_id" id="" class="select select2 form-control">
                <option value=""></option>
                @foreach($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->title}} {{$employee->firstname}} {{$employee->lastname}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <label for="" class="control-label col-lg-12"><strong>ตำแหน่ง </strong> <span class="required">*</span></label>
        </div>
        <div class="col-lg-4">
            <div class="mt-radio-inline">


                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="position" value="1" id="" class="mt-radio">
                                        In-Charge
                                        <span></span>
                                    </label> &nbsp;&nbsp;

                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="position" value="0" id="" class="mt-radio">
                                        TL
                                        <span></span>
                                    </label> &nbsp;&nbsp;
                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="position" value="0" id="" class="mt-radio">
                                        TM1
                                        <span></span>
                                    </label> &nbsp;&nbsp;

                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="position" value="0" id="" class="mt-radio">
                                        TM2
                                        <span></span>
                                    </label>
                                </div>
        </div>

    </div>

</div>

<div class="row">
    <div class="col-lg-12" style="padding-top:20px;">
        <div class="form-actions">
            <div class="col-lg-12">
                <input type="submit" class="btn btn-primary listen" value="Save">
                <a href="{{url('main/pay')}}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>

</div>

</form>
</div>

@endsection

@section('footer')
@if(session()->has('status'))
<script>
  swal({
      title: "<?php echo session()->get('status'); ?>",
      text: "save complete",
      // timer: 3000,
      type: 'success',
      showConfirmButton: true ,
      allowOutsideClick: true
    },
    function() {
      window.location.href = '{{ url("setting/employee") }}';
    });
</script>
@endif
@endsection