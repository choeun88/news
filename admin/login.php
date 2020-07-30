<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: dashboard.php");
    }
    include('includes/config.php');
    if(isset($_POST['submit']))
    {
        $uname=$_POST['username'];
        $password=$_POST['password'];
        $sql =mysqli_query($con,"SELECT username,email,password FROM users WHERE (username='$uname' || email='$uname')");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $hashpassword=$num['password']; // Hashed password fething from database
        //verifying Password
        // if (password_verify($password, $hashpassword)) {
            if(!empty($num)){
                $_SESSION['login']=$_POST['username'];
                echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        }
        else{
            echo "<script>alert('User not registered with us');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php');?>


    <body class="bg-transparent">
        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><img src="assets/images/logo.png" alt="" height="56"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="submit">Log In</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->
                        </div>
                        <!-- end wrapper -->
                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->


    </body>
</html>