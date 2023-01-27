<?php
include('../config/constants.php');

// get the id of the admin to be deleted
//create sql query to delete
//redirect to manage admin page with message (success/error)

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res == true) {
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";

    //redirect to manage admin page
    header('localhost:' . SITEURL . 'admin/manage-admin.php');
}
else {
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin</div>";
    header('localhost:' . SITEURL . 'admin/manage-admin.php');
}

?>
