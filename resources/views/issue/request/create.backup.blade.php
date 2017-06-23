@extends('metronic.master') 
@section('content-breadcrumb')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Incoming Dept.</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('incoming/problem')}}">Issue Request</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('incoming/problem/create')}}">Create</a>
        </li>
    </ul>
</div>
@endsection 
@section('content-title') 
{{--
<h1 class="page-title"><i class="icon-arrow-down"></i> Create Problem</h1> --}} 
@endsection 
@section('content-body')
<div class="row">
    <div class="portlet light bordered">
        <div class="row portlet-title">
            <div class="col-lg-12">
                <h3>Incoming Dept.</h3>
            </div>
        </div>
        <br><br>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('issue/request') }}" data-parsley-validate="" enctype="multipart/form-data" id="myform">
        {{ csrf_field() }}
        <div class="portlet-body form">
            <input type="hidden" name="filename1check" value="0">
            <input type="hidden" name="imgname1check" value="0">
            <input type="hidden" name="imgname2check" value="0">
            <input type="hidden" name="imgname3check" value="0">
         <div class="row">    
            <div class="col-lg-12">   
                    <div class="form-group">
                    <input type="hidden" name="lastuser" value="{{Auth::user()->name}}">
                   
                    <label class="control-label col-lg-1 col-md-3">FM-IN-126 NO. <span class="required">*</span></label>
                    <div class="col-lg-2 col-md-2">                       
                        <input type="text" name="file_doc" value="" class="form-control filedoc" required data-parsley-required-message="กรอก FM-IN-126 No." data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#filedoc-result">
                        <div id="filedoc-result" class="validate-message"></div>                    
                    </div>

                    <label for="" class="control-label col-lg-2 col-md-2">เอกสารแนบ <span class="required">(xls, pdf)</span></label> 
                    <div class="col-lg-3 col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                        <span class="fileinput-filename"> </span>
                                    </div>
                                    <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                    <span class="fileinput-exists"> <i class="icon icon-refresh"></i> </span>
                                    <input type="file" name="attachfile1" id="attachfile1" class="file_doc">
                                    </span>
                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                        <i class="icon icon-close"></i>
                                    </a>
                                    </div>
                                </div>
                    </div>

                    <label for="" class="control-label col-lg-1 col-md-2">อาคาร <span class="required">*</span></label>
                    <div class="col-lg-2 col-md-2">
                    <select class="form-control select2 select2font" name="building_code" required data-parsley-required-message="เลือกอาคาร" data-parsley-errors-container="#building-required">
                      <option></option>
                      @foreach($buildings as $building)
                      <option value="{{$building->code}}" <?php if($building->status = 0) {echo "disabled";} ?> >{{$building->name}}</option>
                      @endforeach
                    </select>                 

                        <div id="building-required" class="validate-message"></div>
                    </div>  

 </div>                   
                   


<div class="form-group">                    
                    <label for="" class="control-label col-lg-1 col-md-2">Photo#1 <div class="required">(jpg, png)</div></label> 
                    <div class="col-lg-2 col-md-2">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt=""> 
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 75px; line-height: 10px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new"> Select file </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="hidden" value="" name=""><input type="file" name="attachimg1" class="file_img"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>  

                    <label for="" class="control-label col-lg-2 col-md-2">Photo#2 <div class="required">(jpg, png)</div></label> 
                    <div class="col-lg-2 col-md-2">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt=""> 
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 75px; line-height: 10px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new"> Select file </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="hidden" value="" name=""><input type="file" name="attachimg2" class="file_img"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>  

                    <label for="" class="control-label col-lg-1 col-md-2">Photo#3 <div class="required">(jpg, png)</div></label> 
                    <div class="col-lg-2 col-md-2">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt=""> 
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 75px; line-height: 10px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new"> Select file </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="hidden" value="" name=""><input type="file" name="attachimg3" class="file_img"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>                                                                                  

 </div>
          <br>             
<div class="form-group">

                    <label class="control-label col-lg-1 col-md-2">วันที่ออกเอกสาร <span class="required">*</span></label>
                    <div class="col-lg-2 col-md-2">
                        <div class="input-group date date-picker pickupDate" data-date-format="yyyy/mm/dd">
                            <input type="text" class="form-control" readonly name="createdate" required data-parsley-required-message="เลือกวันออกเอกสาร" data-parsley-trigger="change focusout" placeholder="" data-parsley-errors-container="#createdate-required">
                            <span class="input-group-btn">
                              <button class="btn default" type="button">
                                  <i class="fa fa-calendar"></i>
                              </button>
                            </span>
                        </div>
                        <div id="createdate-required" class="validate-message"></div>
                    </div>   

                    <label for="" class="control-label col-lg-2 col-md-2">Supplier Name <span class="required">*</span></label>
                    <div class="col-lg-2 col-md-2">
                    <select class="form-control select2 select2font" name="supplier_name" required="" data-parsley-required-message="เลือก Supplier" data-parsley-errors-container="#supplier-required">
                      <option></option>
                      @foreach($suppliers as $suppliers)
                      <option value="{{$suppliers->id}}" <?php if($suppliers->status = 0) {echo "disabled";} ?> >{{$suppliers->sup_name}}</option>
                      @endforeach
                    </select>                 

                        <div id="supplier-required" class="validate-message"></div>
                    </div>

                    <label for="" class="control-label col-lg-1 col-mg-2">รายละเอียดของปัญหา <span class="required">*</span></label>
                    <div class="col-lg-4 col-md-4">
                        <textarea name="detail" id="" cols="10" rows="5" class="form-control" required data-parsley-required-message="ระบุรายละเอียดของปัญหา" data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#detail-required"></textarea>
                        <div class="validate-message" id="detail-required"></div> 
                    </div> 

</div>

                    <div class="row">
                        <div class="col-lg-12" style="padding-top:20px;">
                        <div class="form-actions">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary listen" value="Save">
                                <a href="{{url('issue/request')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>                        
                        </div>

                    </div>

</div>
</div>
</div>
                
        </form>
    </div>
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
      showConfirmButton: true
    },
    function() {
      window.location.href = '{{ url("issue/request") }}';
    });
</script>
@endif

<script>
$(document).ready(function() {
  $('.file_img').change(function() {
    var file = this.files[0],
        val = $(this).val().trim().toLowerCase();
    if (!file || $(this).val() === "") { return; }
    
    var fileSize = file.size / 1024 / 1024,
        regex = new RegExp("(.*?)\.(png|jpg)$"),
        errors = [];
    
    if (fileSize > 2) {
      errors.push("ขนาดไฟล์ต้องไม่เกิน 2 Mb.");
    }
    if (!(regex.test(val))) {
      errors.push('รองรับไฟล์นามสกุล png, jpg เท่านั้น');
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

    $('.file_doc').change(function() {
    var file = this.files[0],
        val = $(this).val().trim().toLowerCase();
    if (!file || $(this).val() === "") { return; }
    
    var fileSize = file.size / 1024 / 1024,
        regex = new RegExp("(.*?)\.(xls|pdf)$"),
        errors = [];
    
    if (fileSize > 2) {
      errors.push("ขนาดไฟล์ต้องไม่เกิน 2 Mb.");
    }
    if (!(regex.test(val))) {
      errors.push('รองรับไฟล์นามสกุล xls, pdf เท่านั้น');
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



