<?php
include('connection.php');
?>

<?php

// SUBJECT FUNCTION
if(isset($_POST["cid"]))
{
    $id = $_POST['cid'];
    $sql = " SELECT * FROM subject WHERE cshort = $id " ;
    $query = mysqli_query($con,$sql);

    while($row_sub = mysqli_fetch_array($query))
    {
        echo strtoupper($row_sub['sub1']." + ".$row_sub['sub2']." + ".$row_sub['sub3']); 
    }
} 

?>


<?php

if(isset($_POST['id']))
{
     $id = $_POST['id'];
     $sql = " SELECT * FROM states WHERE country_id = $id " ;
     $query = mysqli_query($con,$sql); 
     while($row_con = mysqli_fetch_array($query))
     {
     ?> 
     <option value="<?php echo $row_con['id']; ?>"><?php echo $row_con['name']; ?></option>
     <?php
     }
}     
     ?>
     





<?php
if(isset($_POST['did']))
{
     $id = $_POST['did'];
     $sql = " SELECT * FROM cities WHERE state_id = $id " ;
     $query = mysqli_query($con,$sql);  
     while($row_state = mysqli_fetch_array($query))
     {
     ?>

     
     <option value="<?php echo $row_state['name']; ?>"><?php echo $row_state['name']; ?></option>
     <?php
    }
     
}
     ?>
     




   










