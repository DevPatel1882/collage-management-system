<?php
session_start();
if (! (isset ( $_SESSION['NAME']))) {
	
	header ( 'location:login.php' );
} 
// Employ Data Show In Table using While loop in php

//  Data Show 
    include 'connection.php';

 //   $cid = $_POST['cid'];
//	$cshort = $_POST['cshort'];
//	$cfull = $_POST['cfull'];
//	$cdate = $_POST['cdate'];

	$q = " SELECT * FROM `tbl_course` "; 
    $query = mysqli_query($con,$q);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="assest/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    

    <!-- Custom styles for this template -->
    <link href="assest/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assest/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View Course</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>sno</th>
                                            <th>Short Name</th>
                                            <th>Full Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>                                       
                                    </thead>
                                    
                                    <tbody>
                                    <?php

                                       include 'connection.php';

                                       $q = " SELECT * FROM `tbl_course`  " ;
                                       $query = mysqli_query($con,$q);
                                       $sno = 0;
                                       
                                       while($res = mysqli_fetch_array($query)){
                                        $sno = $sno + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $sno ?></td>
                                            <td><?php echo $res['cshort']; ?></td>
                                            <td><?php echo $res['cfull']; ?></td>
                                            <td><?php echo $res['cdate']; ?></td>
                                            <td>
                                                <a href="update-course.php?cid=<?php echo $res['cid']; ?>"  class="edit" ><i style="color:orange" class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;&nbsp;</i></a>
								                <a href="delete_course.php?cid=<?php echo $res['cid']; ?>" class="delete"><i style="color: red;" class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;&nbsp;</i></a>
                                            </td>
                                        </tr>
                                    <?php
                                       }
                                    ?>
                                    
                                        
                                    </tbody>
                                </table>
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
    <script src="assest/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assest/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assest/js/demo/datatables-demo.js"></script>
    
</body>

</html>