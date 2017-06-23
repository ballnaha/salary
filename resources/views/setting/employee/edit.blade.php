@extends('metronic.master') 
@section('content-title')
<!--<h1 class="page-title"><i class="fa fa-user"></i> Create User</h1>-->
@endsection 
@section('content-breadcrumb')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('dashboard')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>ตั้งค่า</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('setting/user')}}">เจ้าหน้าที่</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>เพิ่มเจ้าหน้าที่</span>
        </li>
    </ul>
</div>
<br> 
@endsection 
@section('content-body')
<div class="portlet-title">
    <div class="caption">

        <span class="caption-subject font-red-flamingo bold uppercase"><i class="icon-user"></i> เพิ่มเจ้าหน้าที่</span>
    </div>
</div>
<div class="portlet-body form">
    <h3 class="form-section">ทั่วไป</h3>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('setting/employee') }}/{{$employees->id}}/edit" data-parsley-validate="" enctype="multipart/form-data" id="myform">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <div class="col-lg-12 text-center">
                        <h4>รูปภาพ</h4>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                @if($employees->photo == '')
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> @else
                                <img src="{{url('images/'.$employees->photo)}}"> @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="width: auto; max-height: 100px; line-height: 10px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select file </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="hidden" value="" name=""><input type="file" name="photo" class="file_img"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-9">

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">คำนำหน้า <span class="required">*</span></label>
                        
                        <div class="col-lg-8">
                            <select name="title" class="select select2 form-control" required data-parsley-required-message="เลือกคำนำหน้า" data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#title-required">
                                <option></option>
                                @foreach($titlenames as $titlename)
                                <option <?php if($titlename->name == $employees->title) {echo "selected";} ?> value="{{$titlename->name}}">{{$titlename->name}}</option>
                                @endforeach
                            </select>
                            <div id="title-required" class="validate-message"></div>
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">ชื่อ <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" name="firstname" value="{{$employees->firstname}}" class="form-control firstname" required data-parsley-required-message="กรอกชื่อ" data-parsley-trigger="focusout" placeholder="ชื่อ" data-parsley-errors-container="#firstname-required" >
                                
                                <div id="firstname-required" class="validate-message"></div>
                            </div>

                        </div>
                          
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">นามสกุล <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" name="lastname" value="{{$employees->lastname}}" class="form-control lastname" required data-parsley-required-message="กรอกนามสกุล" data-parsley-trigger="focusout" placeholder="นามสกุล" data-parsley-errors-container="#lastname-required" >

                                <div id="lastname-required" class="validate-message"></div>
                            </div>

                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">ลำดับ</label>
                            <div class="col-lg-8">
                                <input type="text" readonly="readonly" name="priority" value="{{$employees->priority}}" class="form-control priority">

                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Status</label>
                            <div class="col-lg-8">
                                <div class="mt-radio-inline">


                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="status" value="1" id="enable" class="mt-radio" <?php if($employees->status == 1) { echo 'checked'; } ?>>
                                        Enable
                                        <span></span>
                                    </label> &nbsp;&nbsp;

                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="status" value="0" id="disable" class="mt-radio" <?php if($employees->status == 0) { echo 'checked'; } ?>>
                                        Disable
                                        <span></span>
                                    </label>
                                </div>

                            </div>

                        </div>                         
                    </div>
                </div>

        <div class="row">
            <div class="form-actions">
                <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary listen" value="Save">
                    <a href="{{url('setting/employee')}}" class="btn btn-default">Cancel</a>
                </div>
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

<script>
$(document).ready(function() {
  $('input[type=file]').change(function() {
    var file = this.files[0],
        val = $(this).val().trim().toLowerCase();
    if (!file || $(this).val() === "") { return; }
    
    var fileSize = file.size / 1024 / 1024,
        regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$"),
        errors = [];
    
    if (fileSize > 2) {
      errors.push("ขนาดไฟล์ต้องไม่เกิน 2 Mb.");
    }
    if (!(regex.test(val))) {
      errors.push('รองรับไฟล์นามสกุล png, jpeg, jpg, gif เท่านั้น');
    }
    if (errors.length > 0) {  
      $(this).val('');
      //alert(errors.join('\r\n'));
                    swal({
                title: errors.join('\r\n') ,
                text: "คำเตือน",
                // timer: 3000,
                type: 'warning',
                showConfirmButton: true
                });
    }
  });
});
</script>
@endsection