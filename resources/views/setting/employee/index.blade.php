@extends('metronic.master') 
@section('content-title')
<h1 class="page-title"><i class="icon-user"></i> เจ้าหน้าที่</h1>
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
            <span>เจ้าหน้าที่</span>
        </li>
    </ul>
</div>
@endsection 
@section('content-body')
<div class="row">
    <div class="col-lg-1 col-xs-12">
        <a href="{{url('setting/employee/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่มเจ้าหน้าที่</a>
    </div>
    <div class="col-lg-1 col-xs-12">
        <a href="{{url('setting/employee/sort')}}" class="btn btn-primary"><i class="fa fa-bars"></i> เรียงลำดับเจ้าหน้าที่</a>
    </div>
    <div class="col-lg-6 col-xs-6">
        {{-- <a href="{{ url('tcpdf/report_timeline.php')}}" target="_blank" class="btn dark btn-outline pull-right"><i class="fa fa-print"></i> Print</a> --}}
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped" id="setemployee" width="100%">
            <thead>
                <tr>
                    <th style="min-width: 20px;">#</th>
                    <th class="noSorting noExport" style="min-width: 80px;">&nbsp;</th>
                    <th class="noSorting noExport" style="max-width:80px;">Photo</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection @section('footer')
<script type="text/javascript">
$(document).ready(function() {
$('#setemployee').DataTable( {
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
{ extend: 'print', className: 'btn dark btn-outline', title: 'รายชื่อเจ้าหน้าที่',text:'<i class="fa fa-print"></i> Print',
exportOptions: {  
columns: "thead th:not(.noExport)"
} , customize: function ( win ) {
$(win.document.body)
.css( 'font-size', '10pt' )
.prepend(
);
$(win.document.body).find( 'table' )
.addClass( 'compact table-striped' )
.css( 'font-size', 'inherit' );
$(win.document.body).find('h1')
.css('font-size','12pt')
.css('text-align','right')
.css('font-weight','bolder');
} },
// { extend: 'pdf', className: 'btn green btn-outline' },
// { extend: 'csv', className: 'btn purple btn-outline ' }
],
"aoColumnDefs" : [ {
'bSortable' : false,
'aTargets' : [ 'noSorting' ]
} ],
"processing": false,
"ajax": "../jsonemployee.php",

//"scrollX":true,
//"scrollY": true ,
// "fixedColumns": {
// 	leftColumns: 5
// } ,


"columns": [
{ "data": "#"},
{ "data": "actions"},
{ "data": "photo" , "class":""} ,
{ "data": "fullname"} ,
{ "data": "status"}
]
} );

var table =  $('#setemployee').DataTable();
$('#year').on('change', function () {
table.columns(5).search( this.value ).draw();
} );
} );

function DeleteThis( id )
{
var confirmmssg = confirm("ต้องการที่จะลบหรือไม่");
if (confirmmssg ){
$.ajax({
type: "get",
url: "../jsonemployeedelete.php",
data: "id=" + id,
success: function(){

$('#loading').css('display', 'block');
window.location.reload();
}
});
}
}
</script> @endsection