@extends('metronic.master') @section('content-title')
<h1 class="page-title"><i class="fa fa-edit"></i> NC RAW MATERIAL TIMELINE</h1>
@endsection @section('content-breadcrumb')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Issue</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('issue/closed')}}">Closed</a>
        </li>
    </ul>
</div>
@endsection @section('content-body')

<div class="portlet light portlet-fit portlet-datatable bordered">

    <div class="portlet-title">
        <div class="row">
            <div class="col-md-6">
                <div class="caption">
                    
                    <h4 class="caption-subject font-dark sbold uppercase"><i class="fa fa-exclamation-circle font-dark tooltips" data-placement="right" title="" data-original-title="Job Closed แล้วไม่สามารถแก้ไขได้"></i> Job Closed</h4>
                </div>
            </div>
            <div class="col-md-offset-4 col-md-2">
                <select id="year" class="form-control">
										<option value="">-- All Year --</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
									</select>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="col-lg-4 col-md-4">
								<a href="javascript:;" class="btn btn-success evaluatebtn">Success</a>
								<a href="javascript:;" class="btn btn-danger evaluatebtn">Fail</a>
								<a href="" type="reset" class="btn btn-primary">All</a>
							</div>
            </div>
            <div class="col-md-offset-4 col-md-2">
                {{-- <a href="{{ url('tcpdf/report_timeline.php')}}" target="_blank" class="btn dark btn-outline pull-right"><i class="fa fa-print"></i> Print</a> --}}

            </div>
        </div>

    </div>

    <div class="portlet-body">
        <div class="">
            <div class="row">
                <div class="col-lg-12" >
                    <table class="table table-bordered table-striped" id="issuereqtable" width="100%" height="100%">
                        <thead>
                            <tr>
                                <th class="" style="min-width: 10px;">#</th>
                                <th class="noSorting noExport" style="min-width: 50px;">&nbsp;</th>
                                <th class="text-center" style="min-width: 100px;">Status</th>
                                <th class="text-center" style="min-width: 120px;">FM-IN-126 No.</th>
                                <th class="text-center" style="min-width: 120px;">วันที่ออกเอกสาร</th>
                                <th class="text-center" style="min-width: 60px;">ปัญหา</th>
                                <th class="text-center" style="min-width: 60px;">อาคาร</th>
                                <th class="text-center" style="min-width: 110px;">Supplier Name</th>
                                <th class="text-center" style="min-width: 120px;">รายละเอียดของปัญหา</th>
                                <th class="text-center" style="min-width: 120px;">การดำเนินการของฝ่ายจัดซื้อ</th>
                                <th class="text-center" style="min-width: 80px;">Supplier Notification Date </th>
                                <th class="text-center" style="min-width: 120px;">การดำเนินการของ Supplier</th>
                                <th class="text-center" style="min-width: 80px;">วันที่รับ FM-IN-007</th>
                                <th class="text-center" style="min-width: 80px;">FM-IN-007 No.</th>
                                <th class="text-center" style="min-width: 80px;">Claim No.</th>
                                <th class="text-center" style="min-width: 80px;">Return No.</th>
                                <th class="text-center" style="min-width: 80px;">Quantity Claim</th>
                                <th class="text-center" style="min-width: 120px;">Amount Claim (Expect)</th>
                                <th class="text-center" style="min-width: 120px;">Amount Claim (Actual)</th>
                                <th class="text-center" style="min-width: 80px;">ใบลดหนี้/เชค No.</th>
                                <th class="text-center" style="min-width: 80px;">Closed Date</th>
                                <th class="text-center" style="min-width: 80px;">Evaluation</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@foreach($issuereqs as $index=>$issuereq )
<div class="modal bs-modal-lg fade in" id="modal-id{{$issuereq->id}}" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">FM-IN-126 NO. : {{$issuereq->file_doc}}
                <span class="pull-right">
                        @if($issuereq->step4 ==1)
                            <img src="{{url('images/closed.png')}}" alt="" class="img-responsive" style="width:150px;">
                        @endif
                    </span>
                </h4>
                
            </div>
            <div class="modal-body form-horizontal">
            
                    <div class="row form-group">
                        <div class="col-lg-12 bg-blue"><h3>Incoming</h3></div>
                    </div>
                    <div class="row form-group">                    
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-2 col-xs-12"><strong>FM-IN-126</strong></label>
                            <div class="col-lg-3 col-xs-12 line-dashed">{{$issuereq->file_doc}}</div>

                            @if(($issuereq->attachfile1 != '')||($issuereq->attachimg1 != '')||($issuereq->attachimg2 != '')||($issuereq->attachimg3 != ''))    
                            <label class="control-label col-lg-2 col-xs-12"><strong>File Attach</strong></label>
                            @endif
                            <div class="col-lg-5 col-xs-12 line-dashed">
                                &nbsp;
                                @if($issuereq->attachfile1 != '')
                                    <a href="{{url('uploads/'.$issuereq->file_doc.'/file/'.$issuereq->attachfile1)}}" download><i class="fa fa-download tooltips" data-original-title="{{$issuereq->attachfile1}}"></i></span></a>
                                @endif
                                &nbsp;
                                @if($issuereq->attachimg1 != '')
                                    <a data-target="#{{$issuereq->id}}-1" data-toggle="modal" style="text-decoration:none;">
                                        <img src="{{url('uploads/'.$issuereq->file_doc.'/img/'.$issuereq->attachimg1)}}" height="50">
                                    </a>
                                    
                                @endif
                                
                                @if($issuereq->attachimg2 != '')
                                    <a data-target="#{{$issuereq->id}}-2" data-toggle="modal" style="text-decoration:none;">
                                        <img src="{{url('uploads/'.$issuereq->file_doc.'/img/'.$issuereq->attachimg2)}}" height="50">
                                    </a>
                                    
                                @endif  
                                
                                @if($issuereq->attachimg3 != '')
                                    <a data-target="#{{$issuereq->id}}-3" data-toggle="modal" style="text-decoration:none;">
                                        <img src="{{url('uploads/'.$issuereq->file_doc.'/img/'.$issuereq->attachimg3)}}" height="50">
                                    </a>
                                    
                                @endif  
                            </div>
                        </div>
                    </div>    
                    <div class="row form-group">                    
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-2"><strong>วันที่ออกเอกสาร</strong></label>
                            <div class="col-lg-3 line-dashed">{{$issuereq->createdate}}</div>
                            <label class="control-label col-lg-2"><strong>ปัญหา</strong></label>
                            <div class="col-lg-3 line-dashed">{{$issuereq->probname}}</div>
                        </div>
                    </div>
                    <div class="row form-group">                    
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-2"><strong>อาคาร</strong></label>
                            <div class="col-lg-3 line-dashed">{{$issuereq->building_code}}</div>
                            <label class="control-label col-lg-2"><strong>Supplier Name</strong></label>
                            <div class="col-lg-3 line-dashed">{{$issuereq->supname}}</div>
                        </div>
                    </div>
                    <div class="row form-group">                    
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>รายละเอียดของปัญหา</strong></label>
                            <div class="col-lg-9 line-dashed">{{$issuereq->detail}}</div>

                        </div>
                    </div>
                    <div class="row form-group">                    
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-2"><strong>FM-IN-007 NO.</strong></label>
                            <div class="col-lg-10 line-dashed">&nbsp;{{$issuereq->file_doc2}}</div>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-12 bg-purple-medium"><h3>Purchasing</h3></div>
                    </div>
                    <div class="row form-group">                    
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>การดำเนินการของฝ่ายจัดซื้อ</strong></label>
                            <div class="col-lg-9 line-dashed">
                                &nbsp;{{$issuereq->pu_process}} &nbsp;
                                @if($issuereq->pu_attachfile1 != '')
                                    <a href="{{url('uploads/'.$issuereq->file_doc.'/file/'.$issuereq->pu_attachfile1)}}" download><i class="fa fa-download tooltips" data-original-title="{{$issuereq->pu_attachfile1}}"></i></span></a>
                                @endif
                            </div>

                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>การดำเนินการของ Supplier</strong></label>
                            <div class="col-lg-9 line-dashed">
                                &nbsp;{{$issuereq->pu_process_supplier}} &nbsp;
                                @if($issuereq->pu_attachfile2 != '')
                                    <a href="{{url('uploads/'.$issuereq->file_doc.'/file/'.$issuereq->pu_attachfile2)}}" download><i class="fa fa-download tooltips" data-original-title="{{$issuereq->pu_attachfile2}}"></i></span></a>
                                @endif
                            </div>

                        </div>                    
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>Supplier Notification Date</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->sup_notifydate}}
                            </div>
                            <label class="control-label col-lg-3"><strong>วันที่รับ FM-IN-007</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->pu_receiveddate}} &nbsp;
                                @if($issuereq->pu_attachfile3)
                                    <a href="{{url('uploads/'.$issuereq->file_doc.'/file/'.$issuereq->pu_attachfile3)}}" download><i class="fa fa-download tooltips" data-original-title="{{$issuereq->pu_attachfile3}}"></i></span></a>
                                @endif
                            </div>

                        </div>                    
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>Claim No.</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->claim_no}}
                            </div>
                            <label class="control-label col-lg-3"><strong>Return No.</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->return_no}}
                                
                            </div>

                        </div>                    
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>Quantity Claim</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->volume_damage}} {{$issuereq->damage_unit}}
                            </div>
                            <label class="control-label col-lg-3"><strong>Amount Claim (Expect)</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->pu_amount}} บาท
                                
                            </div>

                        </div>                    
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12">
                            <label class="control-label col-lg-3"><strong>Amount Claim (Actual)</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->pu_amount_actual}} บาท
                                
                            </div>
                            <label class="control-label col-lg-3"><strong>ใบลดหนี้/เช็ค No.</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->cheque_no}}
                            </div>
                        </div>                    
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12">
                            
                            <label class="control-label col-lg-3"><strong>Closed Date</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->pu_closeddate}}
                                
                            </div>
                            <label class="control-label col-lg-3"><strong>Evaluation</strong></label>
                            <div class="col-lg-3 line-dashed">
                                &nbsp;{{$issuereq->evalname}}
                            </div>

                        </div>                    
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal bs-modal-lg fade in" id="{{$issuereq->id}}-1" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                {{$issuereq->attachimg1}}
            </div>
            <div class="modal-body">
                <img src="{{url('uploads/'.$issuereq->file_doc.'/img/'.$issuereq->attachimg1)}}" class="img-responsive">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-modal-lg fade in" id="{{$issuereq->id}}-2" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                {{$issuereq->attachimg2}}
            </div>
            <div class="modal-body">
                <img src="{{url('uploads/'.$issuereq->file_doc.'/img/'.$issuereq->attachimg2)}}" class="img-responsive">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-modal-lg fade in" id="{{$issuereq->id}}-3" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                {{$issuereq->attachimg3}}
            </div>
            <div class="modal-body">
                <img src="{{url('uploads/'.$issuereq->file_doc.'/img/'.$issuereq->attachimg3)}}" class="img-responsive">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection @section('footer')
<script type="text/javascript">
$(document).ready(function() {
$('#issuereqtable').DataTable( {
dom: "Bfrtip",
"pageLength": 10,
responsive : false,
"order": [
//[0, 'asc']
],
"lengthMenu": [
[10, 20, 30 , 40 , 50 , -1],
[10, 20, 30 , 40 , 50, "All"] // change per page values here
],
fixedHeader: false ,
buttons: [
// { extend: 'print', className: 'btn dark btn-outline', title: 'Closed Job',text:'<i class="fa fa-print"></i> Print',
// exportOptions: {
// columns: "thead th:not(.noExport)"
// } , customize: function ( win ) {
// $(win.document.body)
// .css( 'font-size', '10pt' )
// .prepend(
// );
// $(win.document.body).find( 'table' )
// .addClass( 'compact table-striped' )
// .css( 'font-size', 'inherit' );
// $(win.document.body).find('h1')
// .css('font-size','12pt')
// .css('text-align','right')
// .css('font-weight','bolder');
// } },
{ extend:'excel' , className : 'btn dark btn-outline' , exportOptions: {
    columns: "thead th:not(.noExport)"
}}
// { extend: 'pdf', className: 'btn green btn-outline' },
// { extend: 'csv', className: 'btn purple btn-outline ' }
],
"aoColumnDefs" : [ {
'bSortable' : false,
'aTargets' : [ 'noSorting' ]
} ],
"processing": false,
"ajax": "../jsonissueclosed.php",

"scrollX":true,
"scrollY": true ,

// "fixedColumns": {
// 	leftColumns: 5
// } ,


"columns": [
{ "data": "#"},
@if(Auth::user()->username<>'guest')
{ "data": "actions"},
@elseif(Auth::user()->username=='guest')
{ "data": "actionsguest"},
@endif
{ "data": "status"} ,
{ "data": "file_doc"} ,
{ "data": "createdate"} ,
{ "data": "problem_code"} ,
{ "data": "building_code"} ,
{ "data": "supplier_name"} , 
{ "data": "detail"} , 
{ "data": "pu_process"} ,
{ "data": "sup_notifydate"} ,
{ "data": "pu_process_supplier"} ,
{ "data": "pu_receiveddate"} ,
{ "data": "file_doc2"} ,
{ "data": "claim_no"} ,
{ "data": "return_no"} ,
{ "data": "volume_damage"} ,
{ "data": "pu_amount"} ,
{ "data": "pu_amount_actual"} ,
{ "data": "cheque_no"} ,
{ "data": "pu_closeddate"} , 
{ "data": "evaluation"}

//{ "data": "filename1" , "class":"photo"} ,
]
} );

var tTable;
tTable = $('#issuereqtable').dataTable();
$('.evaluatebtn').click( function() {
tTable.fnFilter( $(this).text() );
});

var table =  $('#issuereqtable').DataTable();
$('#year').on('change', function () {
table.columns(4).search( this.value ).draw();
} );
} );


function DeleteThis( id ,file_doc, user, dtime )
{
var confirmmssg = confirm('คุณต้องการที่จะลบ ?');
if (confirmmssg ){
$.ajax({
type: "get",
url: "../jsonissuereqdelete.php",
data: "id=" + id + "&file_doc=" + file_doc + "&user={{Auth::user()->name}}&dtime={{date('Y/m/d H:i:s')}}",
success: function(){


$('#loading').css('display', 'block');

window.location.reload();

}
});
}
}



</script> 


@endsection