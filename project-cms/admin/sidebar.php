<?php 
include('function.php');
if(empty($_SESSION['user'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- @theme style -->
    <link rel="stylesheet" href="assets/style/theme.css">
    <link rel="stylesheet" href="assets/style/pic.css">
    <!-- @Bootstrap -->
    <link rel="stylesheet" href="assets/style/bootstrap.css">

    <!-- @script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- @tinyACE -->
    <script src="https://cdn.tiny.cloud/1/5gqcgv8u6c8ejg1eg27ziagpv8d8uricc4gc9rhkbasi2nc4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>
    <main class="admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="content-left">
                        <div class="wrap-top">
                            <img src="assets/icon/admin-logo.png" alt="">
                            <h5>Jong Deng News</h5>
                        </div>
                        <div class="wrap-center">
                            <?php 
                            $id = $_SESSION['user'];
                            $sql = "SELECT * FROM `tbl_user` WHERE `id` ='$id'";
                            $rs = Connection()->query($sql);
                            $row = mysqli_fetch_assoc($rs);
                            ?>
                            <img src="../admin/assets/admin_images/<?php echo $row['profile'] ?>" alt="" width="70px" height="70px">
                            <h6>Welcome Admin <?php echo $row['username'] ?></h6>
                        </div>
                        <div class="wrap-bottom">
                            <ul>
                                
                                <li class="parent">
                                    <a class="parent" href="javascrpit:void(0)">
                                        <span>Logo</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="view-logo.php">View Logo</a>
                                            <a href="add_logo.php">Add Logo</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascrpit:void(0)">
                                        <span>News</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="add-post-news.php">Add News</a>
                                            <a href="view-post-news.php">View News</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascrpit:void(0)">
                                        <span>Footer</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="Add-footer.php">Add Footer</a>
                                            <a href="view-footer.php">View Footer</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascrpit:void(0)">
                                        <span>Contact</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="add_logo_footer.php">Add Contact</a>
                                            <a href="view-logo-footer.php">View Contact</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascrpit:void(0)">
                                        <span>Feedback</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="view-feedback.php">View Feedback</a>
                                            
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascrpit:void(0)">
                                        <span>Follow</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="add-follow.php">Add Follow</a>
                                            <a href="view-follow.php">View Follow</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="logout.php">
                                        <span>Logout Account</span>
                                        <!-- <img src="assets/icon/arrow.png" alt=""> -->
                                    </a>
                                    
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
</body>
