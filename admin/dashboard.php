<?php
session_start();
    include('includes/config.php');
    if(!isset($_SESSION['login'])){ 
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('includes/header.php');?>
    <body class="fixed-left">
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php');?>
            <?php include('includes/leftsidebar.php');?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid p-4">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">News</a>
                                        </li>
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        <div class="row dashboard">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="manage-categories.php">
                                    <div class="card text-center">
                                        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Categories Listed</p>
                                            <?php $query=mysqli_query($con,"select * from tblcategory where Is_Active=1");
                                            $countcat=mysqli_num_rows($query);
                                            ?>

                                            <h2><?php echo htmlentities($countcat);?> <small></small></h2>
                                        
                                        </div>
                                    </div>
                                </a><!-- end col -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="manage-subcategories.php">
                                    <div class="card text-center">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Listed Subcategories</p>
                                                <?php $query=mysqli_query($con,"select * from tblsubcategory where Is_Active=1");
                                                $countsubcat=mysqli_num_rows($query);
                                                ?>
                                            <h2><?php echo htmlentities($countsubcat);?> <small></small></h2>
                                        </div>
                                    </div>
                                </a>
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="manage-posts.php">   
                                    <div class="card text-center">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Live News</p>
                                            <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=1");
                                            $countposts=mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                                
                                        </div>
                                    </div>
                                </a>
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="trash-posts.php"> 
                                    <div class="card text-center">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Trash News</p>
                                            <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=0");
                                            $countposts=mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                                
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    
                    </div> <!-- container -->
                </div> <!-- content -->
                <?php include('includes/footer.php');?>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Right-bar -->
        </div>
      

    </body>
</html>