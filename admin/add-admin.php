<?php include 'partials/menu.php'; ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            } ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td> 
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </<td>
                       
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include 'partials/footer.php'; ?>

<?php //check whether the submit button is clicked or not
//1. Getting the data from form
//process the value from form and save it in database
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Encrypt password //2.SQL to save the data into database
    $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    //3.Execute query and save data into databse
    ($res = mysqli_query($conn, $sql)) or die(mysqli_error($mysqli->error));

    if ($res == true) {
        //create a session variable to display message
        $_SESSION['add'] = "Admin Added Successfully";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
    else {
        $_SESSION['add'] = "Failed to add admin";
        header('location:' . SITEURL . 'admin/add-admin.php');
    }
} ?>
