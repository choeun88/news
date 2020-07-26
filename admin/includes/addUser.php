<?php 
        require_once('database.php');
        $db = new Database();
        $result = $db::query('SELECT *FROM users');

        if(isset($_REQUEST['deleteid'])){
            $id_delete = $_REQUEST['deleteid'];
            $delete = $db::query("delete from users where id=".$id_delete);
            if($delete == true){
                $result = $db::query('SELECT *FROM users');
                echo '<div class="alert alert-success alert_message" role="alert">
                        Data had deleted successful.
                    </div>';
                echo '<script type="text/javascript">
                            setTimeout(function(){
                                window.location.href="add_user.php";
                            },1000);
                     </script>';
            }
        }

        if(isset($_REQUEST['insert'])){
            $target_dir = "uploads/";
            $image= $_FILES['image']['name'];
            $c_image_temp=$_FILES['image']['tmp_name'];
            $supported_image = array('gif','jpg','jpeg','png');
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_image))
            {
                $newname = $image.date("Ymd").'.'.$ext;
                move_uploaded_file( $c_image_temp , "uploads/$newname");
                $name = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $insert = $db::query("insert into users(username,password,image) values('".$name."',".$password.",'".$newname."')");
                if($insert == true){
                    $result = $db::query('SELECT *FROM users');
                    echo '  <div class="alert alert-success alert_message" role="alert">
                                 Data had been inserted.
                            </div>';
                }
            }else{
              echo '<div class="alert alert-success alert_message" role="alert">
                      File is not image.
                    </div>';
            }
        }

        if(isset($_REQUEST['update_id'])){
            
            if(isset($_REQUEST['update'])){
                $name = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $image= $_FILES['image']['name'];
                $update_id = $_REQUEST['update_id'];
                if(empty($image)){
                    
                    $update = $db::query("UPDATE users set username = '".$name."',password = '".$password."'  WHERE id = ".$update_id."");
                    if($update == true){
                        $result = $db::query('SELECT *FROM users');
                        echo '  <div class="alert alert-success alert_message" role="alert">
                                    Date had been updated.
                                </div>';
                    }
                }else{
                    $c_image_temp=$_FILES['image']['tmp_name'];
                    $supported_image = array('gif','jpg','jpeg','png');
                    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    if (in_array($ext, $supported_image))
                    {
                        $newname = $image.date("Ymd").'.'.$ext;
                        move_uploaded_file($c_image_temp , "uploads/$image");
                        $update = $db::query("UPDATE users set username = '".$name."',password = '".$password."' ,image ='".$image."' WHERE id = ".$update_id."");
                        if($update == true){
                            $result = $db::query('SELECT *FROM users');
                            echo '  <div class="alert alert-success alert_message" role="alert">
                                        Date had been updated.
                                    </div>';
                        }
                    }else{
                        echo    '<div class="alert alert-success alert_message" role="alert">
                                    File is not image!
                                </div>';
                    }
                }
               
            }
        }
  
    ?>