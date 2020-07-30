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
                <?php include('./includes/addUser.php') ?>
                <div class="container">
                    <h4>Add New User</h4>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <form  method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" class="form-control" id="username" placeholder="username" name="username" required >
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="text" class="form-control" class="password" id="password" placeholder="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Image:</label>
                                    <input type="file" class="form-control" id="image" placeholder="Enter image"  name="image" required >
                                </div>
                                
                                <button type="submit" class="btn btn-primary" name="insert" id="update_insert">ADD</button>
                                <button  type="submit"  class="btn btn-success after_update"  name="update" >Update</button>
                                <a style="margin-left: 8px;" href="users.php" class="btn btn-primary after_update"  name="update" >New</a> 
                        
                                <input type="hidden" value="" name="update_id" id="update_id">
                            </form>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <img id="image_profile" style="width:220px;height:220px;margin-top:10px" src="uploads/profile.png" alt="Image Profile">
                        </div>
                    </div>
                    <?php 
                        if($result->num_rows > 0){
                            echo '<table class="table"><tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>';
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>".
                                        "<td>".$row["id"]."</td>".
                                        "<td>".$row["username"]."</td>".
                                        "<td>".$row["email"]."</td>".
                                        "<td>".$row["type"]."</td>".
                                        '<td><img style="width:80px" src="uploads/'.$row["image"].'"></td>'.
                                        '<td style="width:20%"> <button name="btn_update" class="btn btn-success btn_select" data-id="'.$row["id"].'"  data-image="'.$row["image"].'"  data-name="'.$row["username"].'" data-password="'.$row["password"].'">Edit</button>  <button  data-toggle="modal" data-target="#deletModal" class=" btn btn-delete btn-danger"  data-id ="'.$row['id'].'">Delete</button></td>'.
                                    "</tr>";
                            }
                            echo '</table>';
                        }
                    ?>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this?
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary btn_delete_yes" >Yes</a>
                            <button type="button" data-dismiss="modal" class="btn btn-primary">No</button>
                        </div>
                        </div>
                    </div>
                </div>
            
                </div> <!-- content -->
                <?php include('includes/footer.php');?>
            </div>
     
        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script>
            var resizefunc = [];
        </script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Dashboard init -->
        <!-- App js -->
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/sidebar.js"></script>
        <script>
            $('.btn-delete').click(function(){
                var id = $(this).data("id");
                $('.btn_delete_yes').attr('href','users.php?deleteid='+id);
            });
            $('.btn_delete_yes').click(function(){

            });

            setTimeout(function(){
                $('.alert_message').slideUp();
            },3000)

            $('.btn_select').click(function(){
                var image = "uploads/"+$(this).data('image');
                $('#username').val($(this).data('name'));
                $('#password').val($(this).data('password'));
                $("#image_profile").attr("src",image);
                $('#update_id').val($(this).data('id'));
                $('.after_update').show();
                $('#update_insert').hide();
                $('#image').removeAttr('required');
            });

            $(document).ready(function(){
                $('.after_update').hide();
                $('#update_insert').show();
                $("#image").change(function(){
                    console.log(this.files[0]);
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        console.log(reader);
                        reader.onload = function (e) {
                            $('#image_profile').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            })
        </script>
    </body>
</html>



