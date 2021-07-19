<?php

include 'connection.php';

if(isset($_POST['cid']))
{
    if($_POST['cid'] != '')
    {
        $sql = " SELECT * FROM `subject` WHERE subid = '".$_POST["cid"]. "'";
    }
    else
    {
        $sql = " SELECT * FROM `subject` " ;
    }
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result))
    {
        $output .= '<input value=" .$row['sub1'];. " id="subject_p" type="text" class="form-control"  placeholder="" required>';
    }
    echo $output;
}

?>