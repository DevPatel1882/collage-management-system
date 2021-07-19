<?php
include 'connection.php';
session_start();
    if(isset($_POST['login']))
	{
        
        $NAME = $_POST['NAME'];
        $PASSWORD = $_POST['PASSWORD'];
        $_SESSION['username']=$_POST['EMAIL'];
        $sql = " SELECT * FROM tbl_login WHERE NAME='$NAME' and PASSWORD='$PASSWORD' " ;
        $query = mysqli_query($con,$sql);

        $login_rec = mysqli_num_rows($query);

        if($login_rec == 1)
        {
            $_SESSION['NAME'] = $NAME;
            $_SESSION['PASSWORD'] = $PASSWORD;
            header("location:add-course.php"); 
        }
        else
        {
            header("location:login.php");
        }
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block " style="background-image:url('assest/img/student.png'); background-size: 100%;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input name="NAME" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input name="PASSWORD" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block" name="login">
                                            Login
                                        </button>
                                        
                                        
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
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