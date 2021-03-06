<?php
include 'connection.php';

session_start();
if (! (isset ( $_SESSION['NAME']))) {
	
	header ( 'location:login.php' );
} 
if(isset($_POST['add_subject'])){
     
    $cshort = $_POST['cshort'];
    $cfull = $_POST['cfull'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];

    $sql = " INSERT INTO `subject`( `cshort`, `cfull`, `sub1`, `sub2`, `sub3` ) VALUES ('$cshort','$cfull','$sub1','$sub2','$sub3') ";
    $query = mysqli_query($con,$sql);
    header("location:view-subjects.php");
}



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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include 'include/sidebar.php';
  
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

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
                                    <h6 class="m-0 font-weight-bold text-primary">Add Subject</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                   <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Course Short Name*</label>
                                         <div class="col-sm-4">
                                    <select class="form-control" aria-label="Default select example" name="cshort" required>
                                        <option selected>SELECT</option>
                                        <?php
                                            $sql = " SELECT * FROM tbl_course ORDER BY  cid " ;
                                            $query = mysqli_query($con,$sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<option value='" . $row['cid'] . "'>" . $row['cshort'] . "</option>";
                                            }
                                        ?> 
                                    </select> 
                                    </div>
                                 </div>  
                                 <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Course Full Name*</label>
                                         <div class="col-sm-4">
                                    <select class="form-control" aria-label="Default select example" name="cfull" required>
                                        <option selected>SELECT</option>
                                        <?php
                                            $sql = " SELECT * FROM tbl_course ORDER BY  cid " ;
                                            $query = mysqli_query($con,$sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<option value='" . $row['cfull'] . "'>" . $row['cfull'] . "</option>";
                                            }
                                        ?> 
                                    </select> 
                                    </div>
                                 </div>  
                                        
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Subject 1*</label>
                                            <div class="col-sm-4">
                                              <input name="sub1" type="text" class="form-control" id="inputPassword" placeholder="" required>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Subject 1*</label>
                                            <div class="col-sm-4">
                                              <input name="sub2" type="text" class="form-control" id="inputPassword" placeholder="" required>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Subject 1*</label>
                                            <div class="col-sm-4">
                                              <input name="sub3" type="text" class="form-control" id="inputPassword" placeholder="" required>
                                            </div>
                                          </div>
                                          
                                          <br>
                                          <button type="submit" class="btn btn-danger " name="add_subject">Create Subject</button>
                                          
                                    </form>
                                    
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
                        <span aria-hidden="true">??</span>
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