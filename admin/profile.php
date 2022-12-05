<?php include "includes/admin_header.php"; ?>
<?php 
 if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
 }


?>

<?php 
   if(isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}
    
    If(isset($_POST['edit_user'])) {

      
        
       
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        
        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];
        
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $post_date = date('d-m-y');
        // $post_comment_count = 4;
            
        //     move_uploaded_file($post_image_temp, "../images/$post_image");
        
        // if(empty($post_image)) {
        //     $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        //     $select_image = mysqli_query($connection, $query);
  
        //     while ($row = mysqli_fetch_array($select_image)) {
        //      $post_image = $row['post_image'];
        //     }
        //   }
  
          $query = "UPDATE users SET ";
          $query .= "user_firstname = '{$user_firstname}', ";
          $query .= "user_lastname = '{$user_lastname}', ";
          $query .= "username =  '{$username}', ";
          $query .= "user_email = '{$user_email}', ";
          $query .= "user_password = '{$user_password}', ";
          $query .= "user_role = '{$user_role}' ";
          $query .= "WHERE username = '{$username}' ";
  
          $edit_user_query = mysqli_query($connection,$query);
          confirmQuery($edit_user_query);
  
    }
    
?>

<body>

    <div id="wrapper">


        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                    <h1 class="page-header">
                        Welcome to Admin
                      <small>Author</small>
                    </h1>

<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
    </div>

    <div class="form-group">

        <select name="user_role" value="<?php $user_role ?>" id="user_role">
        <?php 
            if ($user_role == 'admin') {
               echo "<option value='subscriber'>subscriber</option>"; 
               echo  "<option value='admin'>Admin</option>";
            } else {
              echo  "<option value='admin'>Admin</option>";
              echo "<option value='subscriber'>subscriber</option>"; 
            }
        ?>
        </select>
    </div>
    

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div> -->
    
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" value="<?php echo  $username ?>" name="username">
    </div>
    
    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email">
    </div>

    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" value="<?php echo $user_password?>" name="user_password" value="Add User">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary"  name="edit_user" value="Update Profile">
    </div>
    
</form>
             

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>

</body>

</html>