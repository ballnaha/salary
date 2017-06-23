<?php require_once('connection.php'); ?>

<?php
$sql = "SELECT * from employee order by status desc , priority asc";
$result = mysqli_query($conn, $sql);


$setuser  = array();
$number = 1;

function deleteRow($parameter)
{
    $delete = "<a href='javascript:;' class='btn btn-danger' ";
    $delete .= " OnClick=";
    $delete .= "DeleteThis('" . urlencode($parameter) . "')><i class='fa fa-trash'></i></a>";
    return $delete;
}

    while($row = mysqli_fetch_assoc($result)) {

        $pid = $row['id'];

        $data[] = array(
            '#' => $number++ ,
            'actions' => "<a href='employee/$pid/edit' class='btn btn-primary'><i class='fa fa-pencil'></i></a>" . deleteRow($pid) ,
            'photo' => ($row['photo']!=''?"<div class='center-cropped'><img src='../images/$row[photo]' class='' style='width:auto;height:90px;'></div>":"<div class='center-cropped'><img src='http://www.placehold.it/120x90/EFEFEF/AAAAAA&amp;text=no+image'></div>") ,
            'fullname' => $row['title']." ".$row['firstname']." ".$row['lastname'] ,
            'status' => $row['status']==1 ? "<div class='label label-success'>Enabled</div>" : "<div class='label label-danger'>Disabled</div>" , 
        );

        $setuser = $data;
    }

    //echo json_encode($gantt);
$json = json_encode($setuser, JSON_UNESCAPED_UNICODE);

echo '{ "data" : ' . urldecode(stripslashes($json)) . '}';

?>