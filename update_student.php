<?php
session_start();
if (! (isset ( $_SESSION['NAME']))) {
	
	header ( 'location:login.php' );
} 
include 'connection.php';
if(isset($_POST['update']))
{
 $sid = $_GET['sid'];   
 $enroll_no = $_POST['enroll_no'];   
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $birthdate	 = $_POST['birthdate'];
 $gender = $_POST['gender'];
 $nationality = $_POST['nationality'];
 $category = $_POST['category'];
 $Family_Income = $_POST['Family_Income'];
 $Mobile_Number = $_POST['Mobile_Number'];
 $Email_Id = $_POST['Email_Id'];
 $Permanent_Address = $_POST['Permanent_Address'];
 $Correspondence_Address = $_POST['Correspondence_Address'];
 $country_id = $_POST['country_id'];
 $state_id = $_POST['state_id'];
 $city = $_POST['city'];
 $cshort_id = $_POST['cshort_id'];
 $subject = $_POST['subject'];

$sql = " UPDATE `student` SET `sid`=$sid,`enroll_no`='$enroll_no',`first_name`='$first_name',`last_name`='$last_name',`birthdate`='$birthdate',`gender`='$gender',`nationality`='$nationality',`category`='$category',`Family_Income`='$Family_Income',`Mobile_Number`='$Mobile_Number',`Email_Id`='$Email_Id',`Permanent_Address`='$Permanent_Address',`Correspondence_Address`='$Correspondence_Address',`country_id`='$country_id',`state_id`='$state_id',`city`='$city',`cshort_id`='$cshort_id',`subject`='$subject' WHERE sid = $sid ";
$query = mysqli_query($con,$sql);
header("location:index.php");
}

?>
<?php
include 'connection.php';

$sid = $_GET['sid'];
$q =  "SELECT * FROM student INNER JOIN tbl_course ON student.cshort_id = tbl_course.cid INNER JOIN countries ON countries.id = student.country_id INNER JOIN states on states.id = student.state_id where sid = $sid " ;
$query = mysqli_query($con,$q);

$rec = mysqli_fetch_array($query)

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="assest/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assest/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
 <script>
function showState(val) {
    
    $.ajax({
  type: "POST",
  url: "subject.php",
  data:'id='+val,
  success: function(data){
     //alert(data);
      $("#state").html(data);
  }
  });
}

function showDist(val) {
  
    $.ajax({
  type: "POST",
  url: "subject.php",
  data:'did='+val,
  success: function(data){
     //alert(data);
      $("#dist").html(data);
  }
  });
  
}


function showSub(val) {
    
    //alert(val);
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'cid='+val,
	success: function(data){
	  // alert(data);
		$("#c-full").val(data);
	}
	});
	
}



 </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include 'include/sidebar.php';
  
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <form method="post">
            <!-- Main Content -->
            <div id="content">

            <?php include 'include/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <br>
                        <br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Welcome Admin</h1>
                    <hr>
                    <!-- Content Row -->
                    <div class="row">
                        
                        <div class="col-xl-12 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Register</h6>
                                </div>
                                <div class="card-body">
                                    
                                   <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Select Course<span style="color: red;">*</span></label>
                                         <div class="col-sm-4">
                                    <select  name="cshort_id" class="form-control" aria-label="Default select example" id="cshort"  onchange="showSub(this.value)" required>
                                        
                                        <option slected value="<?php echo $rec['cid'] ?>"><?php echo $rec['cshort'] ?></option>
                                        <?php
                                            include 'connection.php';
                                            
                                            $sql = " SELECT * FROM `tbl_course` ORDER BY  cid " ;
                                            $query = mysqli_query($con,$sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<option value='" . $row['cid'] . "'>" . $row['cshort'] . "</option>";
                                            }
                                            
                                        ?> 
                                    </select> 
                                    </div>
                                
                                 </div> 
                                 
                                 
                                   
                                        
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Select Subject<span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                              
                                              <input value="<?php echo $rec['subject'] ?>"  name="subject"  id="c-full" type="text" class="form-control"  placeholder="" required>
                                               
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Enroll num<span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                              
                                              <input value="<?php echo $rec['enroll_no'] ?>"  name="enroll_no"  id="enroll_no" type="text" class="form-control"  placeholder="" required>
                                               
                                            </div>
                                          </div>
                                          
                                          
                                          
                                          <br>
                                          
                                    
                                </div>
                            </div>

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Personal Informations</h6>
                                </div>

                                
                                <div class="card-body">
                                    

                                    <div class="wrapper rounded bg-white">
                                        
                                        <div class="form">
                                            <div class="row">
                                                <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label> <input value="<?php echo $rec['first_name'] ?>" name="first_name" type="text" class="form-control" required style="width: 500px;"> </div>
                                                <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label> <input value="<?php echo $rec['last_name'] ?>" name="last_name" type="text" class="form-control" required style="width: 500px;"> </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6 mt-md-0 mt-3"><br> <label>Birthday</label> <input value="<?php echo $rec['birthdate'] ?>" name="birthdate" type="date" class="form-control" required style="width: 500px;"> </div>
                                                <div class="col-md-6 mt-md-0 mt-3"><br> <label>Gender</label> <select name="gender" id="sub" class="form-control" required style="width: 500px;">
                                                    <option selected value="<?php echo $rec['gender'] ?>"  ><?php echo $rec['gender'] ?></option>
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                    <option value="OTHERE">OTHER</option>
                                                    
                                                </select> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-md-0 mt-3"><br> <label>Nationality</label> <input value="<?php echo $rec['nationality'] ?>" name="nationality" type="text" class="form-control" required style="width: 500px;"> </div>
                                                <div class="col-md-6 mt-md-0 mt-3"><br> <label>Category</label> <select name="category" id="sub" class="form-control" required style="width: 500px;">
                                                    <option value="<?php echo $rec['category'] ?>" selected ><?php echo $rec['category'] ?></option>
                                                    <option value="GENERAL">GENERAL</option>
                                                    <option value="OBC">OBC</option>
                                                    <option value="SC">SC</option>
                                                    <option value="ST">ST</option>
                                                    
                                                </select> </div>
                                            </div>
                                            <div class=" my-md-2 my-3"><br> <label>Family Income</label> <select name="Family_Income" id="sub" class="form-control" required style="width: 500px;">
                                                    <option value="<?php echo $rec['Family_Income'] ?>" selected ><?php echo $rec['Family_Income'] ?></option>
                                                    <option value="1,00,000">1,00,000</option>
                                                    <option value="2,00,000">2,00,000</option>
                                                    <option value="3,00,000">3,00,000</option>
                                                    <option value="4,00,000">4,00,000</option>
                                                </select> </div>
                                            
                                        </div>
                                    </div>
                                          
                                          
                                          
                                          <br>
                                          
                                    
                                </div>
                            </div>

                            





                           <!-- Area Chart -->
                           <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Contact Informations</h6>
                            </div>

                            
                            <div class="card-body">
                                

                                <div class="wrapper rounded bg-white">
                                    
                                    <div class="form">
                                        <div class="row">
                                            <div class="col-md-6 mt-md-0 mt-3"> <label>Mobile Number</label> <input value="<?php echo $rec['Mobile_Number'] ?>" name="Mobile_Number" type="text" class="form-control" required style="width: 500px;"> </div>
                                            <div class="col-md-6 mt-md-0 mt-3"> <label>Email Id</label> <input value="<?php echo $rec['Email_Id'] ?>" name="Email_Id" type="text" class="form-control" required style="width: 500px;"> </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6 mt-md-0 mt-3"><br> <label>Permanent Address<br></label> <textarea name="Permanent_Address" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $rec['Permanent_Address'] ?></textarea> </div>
                                            <div class="col-md-6 mt-md-0 mt-3"><br> <label>Correspondence Address</label>
                                                <div class="d-flex align-items-center mt-2"> <label class="option"> <textarea name="Correspondence_Address" class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 500px;"><?php echo $rec['Correspondence_Address'] ?></textarea> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-md-0 mt-3"><br> 
                                            <label>Country</label>
                                             <select name="country_id" id="country" class="form-control" onchange="showState(this.value)" required style="width: 500px;">
                                             <option value="<?php echo $rec['id'] ?>" selected><?php echo $rec['c_name'] ?></option>
                                                <?php
                                                $sql = " SELECT * FROM `countries` " ;
                                                $query = mysqli_query($con,$sql);

                                                while($country_rec = mysqli_fetch_array($query)){

                                                
                                                ?>
                                                 <option value="<?php echo $country_rec['id']; ?>"><?php echo $country_rec['c_name']; ?></option>
                                                     
                                               <?php
                                                }
                                               ?>

                                            </select>
                                         </div>
                                            <div class="col-md-6 mt-md-0 mt-3"><br>
                                             <label>State</label>
                                              <select name="state_id" id="state"  class="form-control" onchange="showDist(this.value)" required style="width: 500px;">
                                                <option value="<?php echo $rec['id'] ?>" selected><?php echo $rec['name'] ?></option>
                                                <?php
                                                if(isset($_POST['id']))
                                                {
                                                   $id = $_POST('id');
                                                   $sql = " SELECT * FROM states WHERE country_id = $id"  ;
                                                   $query = musqli_query($con,$sql);

                                                   
                                                while($row = mysqli_fetch_array($query)){
                                                ?>    
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                        }
                                            ?>
                                            </select> </div>
                                        </div>
                                        <div class=" my-md-2 my-3"><br>
                                         <label>City</label>
                                         <select name="city" id="dist" class="form-control" onchange="" required style="width: 500px;">
                                                <option value="<?php echo $rec['city'] ?>" selected><?php echo $rec['city'] ?></option>
                                                
                                            </select> </div>
                                        
                                    </div>
                                </div>
                                      
                                      
                                      
                                      <br>
                                      <button name="update" type="submit" class="btn btn-danger">Submit</button>
                                      
                                
                            </div>
                        </div>


                        </div>

                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        </form>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assest/vendor/jquery/jquery.min.js"></script>
    <script src="assest/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assest/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assest/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assest/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assest/js/demo/chart-area-demo.js"></script>
    <script src="assest/js/demo/chart-pie-demo.js"></script>
    <script src="assest/js/demo/chart-bar-demo.js"></script>
    
  
   
</body>
</html>
