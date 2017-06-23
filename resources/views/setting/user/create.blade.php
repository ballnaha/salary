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
            <span>Settings</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('setting/user')}}">Users</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Create</span>
        </li>
    </ul>
</div>
<br> 
@endsection 
@section('content-body')
<div class="portlet-title">
    <div class="caption">

        <span class="caption-subject font-red-flamingo bold uppercase"><i class="icon-user"></i> Create User</span>
    </div>
</div>
<div class="portlet-body form">
    <h3 class="form-section">General</h3>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('setting/user') }}" data-parsley-validate="" enctype="multipart/form-data" id="myform">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <div class="col-lg-12 text-center">
                        <h4>Avatar</h4>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                            <div>
                                <span class="btn default btn-file">
                            <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="hidden" value="" name=""><input type="file" name="photo"> 
                                <div id="photo-required" class="validate-message"></div>
                                </span>
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
                            <label for="" class="control-label col-lg-4">Username <span class="required">*</span></label>
                            
                            <div class="col-lg-8">
                                <input type="text" name="username" value="{{old('username')}}" class="form-control" required data-parsley-required-message="กรอก username" data-parsley-trigger="focusout" placeholder="username" data-parsley-errors-container="#username-required">
                                <div id="username-required" class="validate-message"></div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong class="validate-message">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Password <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <input type="password" name="password" value="" class="form-control" id="password" required data-parsley-required-message="กรอก password" data-parsley-trigger="focusout" placeholder="password" data-parsley-errors-container="#password-required">
                                <div id="password-required" class="validate-message"></div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Confirm Password <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <input id="password_w" type="password" class="form-control placeholder-no-fix" placeholder="Confirm Password" name="password_w" data-parsley-required-message="กรอก confirm password" data-parsley-trigger="focusout" data-parsley-equalto="#password" required data-parsley-errors-container="#confirm-required">
                                <div id="confirm-required" class="validate-message"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Fullname <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" required data-parsley-required-message="กรอก fullname" data-parsley-trigger="focusout" placeholder="fullname" data-parsley-errors-container="#fullname-required" >
                                <div id="fullname-required" class="validate-message"></div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Email</label>
                            <div class="col-lg-8">
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" required data-parsley-required-message="กรอก email" data-parsley-trigger="focusout" placeholder="email" data-parsley-errors-container="#email-required">
                                <div id="email-required" class="validate-message"></div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="validate-message">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                                
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Role <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <select class="form-control select2" name="role" required data-parsley-required-message="เลือก Role" data-parsley-trigger="focusout" data-parsley-errors-container="#role-required" >
                                    <option value="">--Select--</option>
                                    @foreach($userAuths as $userAuth)
                                    <option value="{{$userAuth->code}}" <?php if($userAuth->status == 0){echo"disabled";} ?> >   
                                    {{$userAuth->name}}</option>
                                    @endforeach
                                </select>
                                <div id="role-required" class="validate-message"></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Department</label>
                            <div class="col-lg-8">
                                <select class="form-control select2" name="department_code" required data-parsley-required-message="เลือกแผนก" data-parsley-trigger="focusout" data-parsley-errors-container="#department-required" >
                                    <option value="">--Select--</option>
                                    @foreach($departments as $department)
                                    <option value="{{$department->code}}" <?php if($department->status == 0){echo"disabled";} ?> >   
                                    {{$department->name}}</option>
                                    @endforeach
                                </select>
                                <div id="department-required" class="validate-message"></div>

                            </div>

                        </div>
                        <div class="col-lg-4">
                            <label for="" class="control-label col-lg-4">Status</label>
                            <div class="col-lg-8">
                                <div class="mt-radio-inline">


                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="status" value="1" id="enable" class="mt-radio" checked="checked">
                                        Enable
                                        <span></span>
                                    </label> &nbsp;&nbsp;

                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="status" value="0" id="disable" class="mt-radio">
                                        Disable
                                        <span></span>
                                    </label>
                                </div>

                            </div>

                        </div>                        
                    </div>
                </div>
<br><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12 text-right" style="font-size:11px; color:red;">
                            หมายเหตุ : 
                            MAIL_DRIVER=smtp ,
                            MAIL_HOST=192.168.11.16 ,
                            MAIL_PORT=25 ,
                            MAIL_USERNAME=null ,
                            MAIL_PASSWORD=null ,
                            MAIL_ENCRYPTION=null
                        </div>
                    </div>          
                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-actions">
                <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary listen" value="Save">
                    <a href="{{url('setting/user')}}" class="btn btn-default">Cancel</a>
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
      window.location.href = '{{ url("setting/user") }}';
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