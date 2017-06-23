@extends('metronic.master') 

@section('content-breadcrumb')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('dashboard')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('setting/employee')}}">เจ้าหน้าที่</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>เรียงลำดับเจ้าหน้าที่ </span>
        </li>
    </ul>
</div>
@endsection
@section('content-title')
<h1 class="page-title"><i class="icon-user"></i> เรียงลำดับรายชื่อเจ้าหน้าที่ จำนวน {{$counts}} คน</h1>
@endsection 
@section('content-body')
	<div class="row">
		<div class="col-lg-12">
		<div id="msg" style="display: none;" class="alert alert-success">Save Complete</div>
			<div class="col-lg-4">
			<ul id="sortme" class="list-group">
			@foreach($sorts as $sort)
				@if($sort->status == 0)
				<li class="list-group-item-heading list-group-item-danger" style="cursor:move;" id="menu_{{$sort->id}}">{{$sort->priority}}. {{$sort->firstname}} {{$sort->lastname}}</li>
				@else
				<li class="list-group-item-heading list-group-item" style="cursor:move;" id="menu_{{$sort->id}}">{{$sort->priority}}. {{$sort->firstname}} {{$sort->lastname}}</li>
				@endif
			@endforeach	
			</ul>				
			</div>

		</div>
	</div>
@endsection

@section('footer')

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.js"></script>
<script>
$(document).ready(
function() {
$("#sortme").sortable({
update : function () {
serial = $('#sortme').sortable('serialize');
$.ajax({
url: "{{url('dragndrop/sort_menu.php')}}",
type: "post",
data: serial,
success: function (data) {
               $("#msg").show();
               setTimeout(function() { $("#msg").hide(); }, 5000);
        },
error: function(){
alert("theres an error with AJAX");
}
});
}
});
}
);
</script>
@endsection