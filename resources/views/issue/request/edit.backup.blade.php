@extends('metronic.master') @section('content-breadcrumb')
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
            <a href="{{url('incoming/problem/create')}}">Edit</a>
        </li>
    </ul>
</div>
@endsection @section('content-title') {{--
<h1 class="page-title"><i class="icon-arrow-down"></i> Create Problem</h1> --}} @endsection @section('content-body')
<div class="row">
    <div class="portlet light bordered">
        <div class="row portlet-title">
            <div class="col-lg-12">
                <div class="caption">
                    <h3><i class="fa fa-envelope-o"></i> รายงานการแจ้งปัญหาและการออกจดหมายเคลม</h3>

                </div>
                {{--
                <div class="tools">
                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div> --}}
            </div>

        </div>

        <div class="tabbable-line">
            <ul class="nav nav-tabs " id="myTab">
                <li class="active">
                    <a href="#tab_incoming" data-toggle="tab"> INCOMING</a>
                </li>
                <li>
                    <a href="#tab_pu" data-toggle="tab"> PURCHASING </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_incoming">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('issue/request') }}/{{$issuereqs->id}}/edit" data-parsley-validate=""
                        enctype="multipart/form-data" id="form1">
                        {{ csrf_field() }}
                        <input type="hidden" value="incomingform" name="incomingform">
                        <div class="portlet-body form">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="hidden" name="lastuser" value="{{Auth::user()->name}}">

                                        <label class="control-label col-lg-1 col-md-3"><strong>FM-IN-126 NO. </strong><span class="required">*</span></label>
                                        <div class="col-lg-2 col-md-2">
                                            <input type="text" name="file_doc" value="{{$issuereqs->file_doc}}" class="form-control filedoc" readonly="readonly">
                                        </div>

                                        <label class="control-label col-lg-2 col-md-2"><strong>เอกสารแนบ </strong><span class="required">(xls, pdf ขนาดไม่เกิน 2 Mb.)</span></label>
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
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                @if($issuereqs->attachfile1 != '')
                                                <div class="col-lg-9">
                                                    <a href="">{{$issuereqs->attachfile1}} </a>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="filename1check">
                                                <input name="filename1check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="filename1check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label>
                                                </div>
                                                @else
                                                <input name="filename1check" type="hidden" value="0"> @endif
                                            </div>


                                        </div>

                                        <label class="control-label col-lg-1 col-md-2"><strong>อาคาร </strong><span class="required">*</span></label>
                                        <div class="col-lg-2 col-md-2">
                                            <select class="form-control select2 select2font" name="building_code" required data-parsley-required-message="เลือกอาคาร"
                                                data-parsley-errors-container="#building-required">
                      <option></option>
                      @foreach($buildings as $building)
                      <option value="{{$building->code}}" <?php if ($building->code == $issuereqs->building_code) {echo "selected";}?> <?php if($building->status = 0) {echo "disabled";} ?> >{{$building->name}}</option>
                      @endforeach
                    </select>

                                            <div id="building-required" class="validate-message"></div>
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-lg-1 col-md-2"><strong>Photo#1 </strong><div class="required">(jpg, png ขนาดไม่เกิน 2 Mb.)</div></label>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: auto; height: 100px;">
                                                    @if($issuereqs->attachimg1 == '')
                                                    <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt="">                                                    @else
                                                    <img src="{{url('uploads/'.$issuereqs->file_doc.'/img/'.$issuereqs->attachimg1)}}">                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width: auto; max-height: 100px; line-height: 10px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                <span class="fileinput-new"> Select file </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="hidden" value="" name=""><input type="file" name="attachimg1"
                                                        class="file_img"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>

                                            &nbsp;&nbsp;&nbsp; @if($issuereqs->attachimg1 != '')

                                            <label for="imgname1check">
                                                <input name="imgname1check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="imgname1check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label> @else
                                            <input name="imgname1check" type="hidden" value="0"> @endif


                                        </div>

                                        <label class="control-label col-lg-2 col-md-2"><strong>Photo#2 </strong><div class="required">(jpg, png ขนาดไม่เกิน 2 Mb.)</div></label>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: auto; height: 100px;">
                                                    @if($issuereqs->attachimg2 == '')
                                                    <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt="">                                                    @else
                                                    <img src="{{url('uploads/'.$issuereqs->file_doc.'/img/'.$issuereqs->attachimg2)}}">                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width: auto; max-height: 100px; line-height: 10px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                <span class="fileinput-new"> Select file </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="hidden" value="" name=""><input type="file" name="attachimg2"
                                                        class="file_img"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp; @if($issuereqs->attachimg2 != '')

                                            <label for="imgname2check">
                                                <input name="imgname2check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="imgname2check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label> @else
                                            <input name="imgname2check" type="hidden" value="0"> @endif
                                        </div>

                                        <label class="control-label col-lg-1 col-md-2"><strong>Photo#3 </strong><div class="required">(jpg, png ขนาดไม่เกิน 2 Mb.)</div></label>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: auto; height: 100px;">
                                                    @if($issuereqs->attachimg3 == '')
                                                    <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt="">                                                    @else
                                                    <img src="{{url('uploads/'.$issuereqs->file_doc.'/img/'.$issuereqs->attachimg3)}}">                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width: auto; max-height: 100px; line-height: 10px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                <span class="fileinput-new"> Select file </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="hidden" value="" name=""><input type="file" name="attachimg3"
                                                        class="file_img"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            &nbsp;&nbsp;&nbsp; @if($issuereqs->attachimg3 != '')

                                            <label for="imgname3check">
                                                <input name="imgname3check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="imgname3check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label> @else
                                            <input name="imgname3check" type="hidden" value="0"> @endif
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-group">

                                        <label class="control-label col-lg-1 col-md-2"><strong>วันที่ออกเอกสาร </strong><span class="required">*</span></label>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="input-group date date-picker pickupDate" data-date-format="yyyy/mm/dd">
                                                <input type="text" class="form-control" name="createdate" required data-parsley-required-message="เลือกวันออกเอกสาร" data-parsley-trigger="change focusout"
                                                    placeholder="" data-parsley-errors-container="#createdate-required" value="{{$issuereqs->createdate}}">
                                                <span class="input-group-btn">
                              <button class="btn default" type="button">
                                  <i class="fa fa-calendar"></i>
                              </button>
                            </span>
                                            </div>
                                            <div id="createdate-required" class="validate-message"></div>
                                        </div>

                                        <label class="control-label col-lg-2 col-md-2"><strong>Supplier Name </strong><span class="required">*</span></label>
                                        <div class="col-lg-2 col-md-2">
                                            <select class="form-control select2 select2font" name="supplier_name" required="" data-parsley-required-message="เลือก Supplier"
                                                data-parsley-errors-container="#supplier-required">
                      <option></option>
                      @foreach($suppliers as $suppliers)
                      <option value="{{$suppliers->id}}" <?php if ($suppliers->id == $issuereqs->supplier_name) {echo "selected";}?> <?php if($suppliers->status = 0) {echo "disabled";} ?> >{{$suppliers->sup_name}}</option>
                      @endforeach
                    </select>

                                            <div id="supplier-required" class="validate-message"></div>
                                        </div>

                                        <label class="control-label col-lg-1 col-md-2"><strong>รายละเอียดของปัญหา </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <textarea name="detail" id="" cols="10" rows="5" class="form-control" required data-parsley-required-message="ระบุรายละเอียดของปัญหา"
                                                data-parsley-trigger="focusout" data-parsley-errors-container="#detail-required">{{$issuereqs->detail}}</textarea>
                                            <div class="validate-message" id="detail-required"></div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-lg-1 col-md-2"><strong>FM-IN-007</strong></label>
                                        <div class="col-lg-2 col-md-2">
                                            <input type="text" name="file_doc2" class="form-control" value="{{$issuereqs->file_doc2}}">
                                            <div class="validate-message" id="filedoc2-required"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12" style="padding-top:20px;">
                                            <div class="form-actions">
                                                <div class="col-lg-12">
                                                    <input type="submit" class="btn btn-primary listen" value="Save" name="incomingform">
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
                
                <div class="tab-pane fade" id="tab_pu">

<div class="row">
    <div class="col-lg-6">
    
<div class="portlet light bordered">

<legend class="m-heading-1 border-yellow m-bordered">STEP 1</legend>
<form class="form-horizontal" role="form" method="POST" action="{{ url('issue/request') }}/{{$issuereqs->id}}/edit#tab_pu"
                        data-parsley-validate="" enctype="multipart/form-data" id="form2">
                        {{ csrf_field() }}
                        <input type="hidden" value="puform" name="puform">
                        <div class="portlet-body form">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-3"><strong>FM-IN-126 </strong><span class="required">*</span></label>
                                        <div class="col-lg-9 col-md-9">
                                            <input type="text" name="file_doc" value="{{$issuereqs->file_doc}}" class="form-control filedoc" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-3"><strong>การดำเนินการของฝ่ายจัดซื้อ </strong><span class="required">*</span></label>
                                        <div class="col-lg-9 col-md-9">
                                                <textarea name="pu_process" cols="10" rows="3" class="form-control" required data-parsley-required-message="กรอกการดำเนินการของฝ่ายจัดซื้อ" data-parsley-trigger="focusout" placeholder="" data-parsley-errors-container="#puprocess-required">{{$issuereqs->pu_process}}</textarea>

                                            <div class="validate-message" id="puprocess-required"></div>
                                        </div>
                                    </div>    

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-3"><strong>เอกสารแนบของฝ่ายจัดซื้อ</strong></label>

                                        <div class="col-lg-9 col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="input-group input-large">
                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"> </span>
                                                    </div>
                                                    <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                    <span class="fileinput-exists"> <i class="icon icon-refresh"></i> </span>
                                                    <input type="file" name="pu_attachfile1" id="pu_attachfile1" class="file_doc">
                                                    </span>
                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                        <i class="icon icon-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                @if($issuereqs->pu_attachfile1 != '')
                                                <div class="col-lg-6">
                                                    <a href="">{{$issuereqs->pu_attachfile1}} </a>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="pu_attachfile1check">
                                                <input name="pu_attachfile1check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="pu_attachfile1check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label>
                                                </div>
                                                @else
                                                <input name="pu_attachfile1check" type="hidden" value="0"> @endif
                                            </div>
                                        </div>


                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-3"><strong>Supplier Notification Date </strong><span class="required">*</span></label>
                                        <div class="col-lg-9 col-md-9">
                                            <div class="input-group date date-picker supnotifyDate" data-date-format="yyyy/mm/dd">
                                                <input type="text" class="form-control" name="sup_notifydate" required data-parsley-required-message="เลือก Supplier Notification Date"
                                                    data-parsley-trigger="change focusout" placeholder="" data-parsley-errors-container="#supnotifydate-required"
                                                    value="{{$issuereqs->sup_notifydate}}">
                                                <span class="input-group-btn">
                              <button class="btn default" type="button">
                                  <i class="fa fa-calendar"></i>
                              </button>
                            </span>
                                            </div>
                                            <div class="validate-message" id="supnotifydate-required"></div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-3"><strong>การดำเนินการของ Supplier </strong><span class="required">*</span></label>
                                        <div class="col-lg-9 col-md-9">

                                            <textarea name="pu_process_supplier" id="pu_process_supplier" cols="10" rows="3" class="form-control" required data-parsley-required-message="กรอกการดำเนินการของ Supplier" data-parsley-trigger="focusout"
                                                placeholder="" data-parsley-errors-container="#puprocesssupplier-required">{{$issuereqs->pu_process_supplier}}</textarea>

                                            <div class="validate-message" id="puprocesssupplier-required"></div>
                                        </div>
                                     </div>

                                     <div class="form-group">       
                                        <label class="control-label col-lg-3 col-md-3"><strong>เอกสารแนบของ Supplier</strong></label>

                                        <div class="col-lg-9 col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="input-group input-large">
                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"> </span>
                                                    </div>
                                                    <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                    <span class="fileinput-exists"> <i class="icon icon-refresh"></i> </span>
                                                    <input type="file" name="pu_attachfile2" id="pu_attachfile2" class="file_doc">
                                                    </span>
                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                        <i class="icon icon-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                @if($issuereqs->pu_attachfile2 != '')
                                                <div class="col-lg-6">
                                                    <a href="">{{$issuereqs->pu_attachfile2}} </a>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="pu_attachfile2check">
                                                <input name="pu_attachfile2check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="pu_attachfile2check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label>
                                                </div>
                                                @else
                                                <input name="pu_attachfile2check" type="hidden" value="0"> @endif
                                            </div>
                                        </div>


                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-3"><strong>วันที่รับ FM-IN-007 </strong><span class="required">*</span></label>
                                        <div class="col-lg-9 col-md-9">
                                            <div class="input-group date date-picker receivedDate" data-date-format="yyyy/mm/dd">
                                                <input type="text" class="form-control" name="pu_receiveddate" required data-parsley-required-message="เลือกวันที่รับ FM-IN-007"
                                                    data-parsley-trigger="change focusout" placeholder="" data-parsley-errors-container="#receiveddate-required"
                                                    value="{{$issuereqs->pu_receiveddate}}">
                                                <span class="input-group-btn">
                              <button class="btn default" type="button">
                                  <i class="fa fa-calendar"></i>
                              </button>
                            </span>
                                            </div>
                                            <div class="validate-message" id="receiveddate-required"></div>
                                        </div>
                                   </div>     

                                   <div class="form-group"> 
                                        <label class="control-label col-lg-3 col-md-3"><strong>เอกสารแนบ FM-IN-007</strong></label>

                                        <div class="col-lg-9 col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="input-group input-large">
                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"> </span>
                                                    </div>
                                                    <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                    <span class="fileinput-exists"> <i class="icon icon-refresh"></i> </span>
                                                    <input type="file" name="pu_attachfile3" id="pu_attachfile3" class="file_doc">
                                                    </span>
                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                        <i class="icon icon-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                @if($issuereqs->pu_attachfile3 != '')
                                                <div class="col-lg-6">
                                                    <a href="">{{$issuereqs->pu_attachfile3}} </a>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="pu_attachfile3check">
                                                <input name="pu_attachfile3check" type="hidden" value="0">
                                                <input type="checkbox" class="icheck" name="pu_attachfile3check" value="1" data-checkbox="icheckbox_square-grey">
                                                
                                                <i class="glyphicon glyphicon-trash red"></i>
                                             </label>
                                                </div>
                                                @else
                                                <input name="pu_attachfile3check" type="hidden" value="0"> @endif
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12" style="padding-top:20px;">
                                            <div class="form-actions">
                                                <div class="col-lg-12">
                                                    <input type="submit" class="btn btn-primary listen" value="Save" id="btnpu">
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

    <div class="col-lg-6">
    
<div class="portlet light bordered">
<legend class="m-heading-1 border-grey m-bordered">STEP 2</legend>
<form class="form-horizontal" role="form" method="POST" action="{{ url('issue/request') }}/{{$issuereqs->id}}/edit#tab_pu"
                        data-parsley-validate="" enctype="multipart/form-data" id="form3">
                        {{ csrf_field() }}
                        <input type="hidden" value="puform2" name="puform2">
                        <div class="portlet-body form">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"><strong>Claim No. </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <input type="text" name="claim_no" value="{{$issuereqs->claim_no}}" class="form-control" required data-parsley-required-message="กรอก Claim No." data-parsley-trigger="focusout"
                                                placeholder="" data-parsley-errors-container="#claimno-required" value="{{$issuereqs->claim_no}}">

                                            <div class="validate-message" id="claimno-required"></div>    
                                        </div>

                                        <label class="control-label col-lg-2 col-md-2"><strong>Return No. </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <input type="text" name="return_no" value="{{$issuereqs->return_no}}" class="form-control" required data-parsley-required-message="กรอก Return No." data-parsley-trigger="focusout"
                                                placeholder="" data-parsley-errors-container="#returnno-required">

                                            <div class="validate-message" id="returnno-required"></div>    
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"><strong>ปริมาณความเสียหาย </strong><span class="required">*</span></label>
                                        <div class="col-lg-3 col-md-3">
                                            <input type="text" name="volume_damage" value="{{$issuereqs->volume_damage}}" class="form-control" required data-parsley-required-message="กรอกปริมาณความเสียหาย" data-parsley-trigger="focusout"
                                                placeholder="" data-parsley-errors-container="#voldam-required" value="{{$issuereqs->volume_damage}}">

                                            <div class="validate-message" id="voldam-required"></div>    
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="padding:0;">
                                            <select name="" id="" class="form-control">
                                                <option value=""></option>
                                                <option value="ea">ea.</option>
                                                <option value="kg">kg.</option>
                                                <option value="sh">sh.</option>
                                            </select>
                                        </div>

                                        <label class="control-label col-lg-2 col-md-2"><strong>จำนวนเงิน(บาท) </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <input type="text" name="pu_amount" value="{{$issuereqs->pu_amount}}" class="form-control" required data-parsley-required-message="กรอกจำนวนเงิน" data-parsley-trigger="focusout"
                                                placeholder="" data-parsley-errors-container="#amount-required">

                                            <div class="validate-message" id="amount-required"></div>    
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"><strong>ใบลดหนี้/เช็ค No. </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <input type="text" name="cheque_no" value="{{$issuereqs->cheque_no}}" class="form-control" required data-parsley-required-message="กรอก Claim No." data-parsley-trigger="focusout"
                                                placeholder="" data-parsley-errors-container="#chequeno-required" value="{{$issuereqs->cheque_no}}">

                                            <div class="validate-message" id="chequeno-required"></div>    
                                        </div>

                                        <label class="control-label col-lg-2 col-md-2"><strong>Closed Date. </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group date date-picker closedDate" data-date-format="yyyy/mm/dd">
                                                <input type="text" class="form-control" name="pu_closeddate" required data-parsley-required-message="เลือก Closed Date"
                                                    data-parsley-trigger="change focusout" placeholder="" data-parsley-errors-container="#closeddate-required"
                                                    value="{{$issuereqs->pu_closeddate}}">
                                                <span class="input-group-btn">
                              <button class="btn default" type="button">
                                  <i class="fa fa-calendar"></i>
                              </button>
                            </span>
                                            </div>

                                            <div class="validate-message" id="closeddate-required"></div>    
                                        </div>

                                    </div>   

                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"><strong>Evaluation </strong><span class="required">*</span></label>
                                        <div class="col-lg-4 col-md-4">
                                            <select name="" id="" class="form-control">
                                                <option value=""></option>
                                                <option value="pending">Pending</option>
                                                <option value="success">Success</option>
                                                <option value="fail">Fail</option>
                                            </select>

                                        </div>
                                    </div>                                 


                                    <div class="row">
                                        <div class="col-lg-12" style="padding-top:20px;">
                                            <div class="form-actions">
                                                <div class="col-lg-12">
                                                    <input type="submit" class="btn btn-primary listen" value="Save" id="btnpu2">
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
</div>





                </div>

            </div>
        </div>
    </div>
</div>






@endsection @section('footer') @if(session()->has('status'))
<script>
  swal({
      title: "<?php echo session()->get('status'); ?>",
      text: "save complete",
      type: 'success',
      showConfirmButton: true ,
      allowOutsideClick: true
    },
    function() {
      window.location.href = '{{ url("issue/request") }}';
    });

/*toastr.options = {
"closeButton": true,
"debug": false,
"positionClass": "toast-top-right",
"onclick": null,
"showDuration": "2000",
"hideDuration": "2000",
"timeOut": "10000",
"extendedTimeOut": "2000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
toastr.success("Save Complete","Success !!");*/

</script> @endif @if(session()->has('pustatus'))
<script>
  swal({
      title: "<?php echo session()->get('pustatus'); ?>",
      text: "save complete",
      type: 'success',
      showConfirmButton: true ,
      allowOutsideClick: true
    },
    function() {
      window.location.href = '{{ url("issue/request") }}';
    });

</script> @endif

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

<script>  
// when save in tabs display not changed  
$('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');

</script> 

<script>
// disabled anchor scroll
$('a').click(function (e) {
    var x = window.pageXOffset,
        y = window.pageYOffset;
    $(window).one('scroll', function () {
        window.scrollTo(x, y);
    })
});
</script>
@endsection