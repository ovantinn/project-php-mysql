<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./assets/js/update_news.js"></script>
<?php 
function Connection(){
    $connection = new mysqli('localhost','root','','project');
    return $connection;
}
function Register(){
    if(isset($_POST['btn_register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile = $_FILES['profile']['name'];
        if(!empty($username) && !empty($email) && !empty($password) && !empty($profile)){
            $profile = date('dmyhis').'_'.$profile;
            $path  = './assets/admin_images/'.$profile;
            move_uploaded_file($_FILES['profile']['tmp_name'],$path);
            $password = md5($password);
            $sql = "INSERT INTO `tbl_user`(`username`, `email`, `password`, `profile`) VALUES ('$username','$email','$password','$profile')";
            $rs = Connection()->query($sql);
            if($rs){
                header('location:login.php');
            }
        }
    }
}
Register();

session_start();

function Login(){
if(isset($_POST['btn_login'])){
    $name_email = $_POST['name_email'];
    $password = $_POST['password'];
    if(!empty($name_email) && !empty($password)){
        $password = md5($password);
        $sql = "SELECT * FROM `tbl_user` WHERE ((`username`='$name_email' OR `email`='$name_email') AND `password`='$password')";
        $rs = Connection()->query($sql);
        $row = mysqli_fetch_assoc($rs);
        if(!empty($row)){
            $id = $row['id'];
            $_SESSION['user']=$id;
            header('location:index.php');
        }
        else{
            echo 
            '
                
            ';
        }
    }
}
}
Login();
// Logout Function 
function Logout(){
    if(isset($_POST['btn-logout'])){
        unset($_SESSION['user']);
    }
}
Logout();
// End of function logout

// function addLogo
function addLogo(){
    if(isset($_POST['logo'])){
        $status = $_POST['status'];
        $thumnail = $_FILES['thumnail']['name'];
        $tmp_thumnail = $_FILES['thumnail']['tmp_name'];
        if(!empty($status) && !empty($thumnail)){
            $thumnail = date('dmyhis').'_'.$thumnail;
            $path = './assets/Logo/'.$thumnail;
            move_uploaded_file($tmp_thumnail,$path);
            $sql = "INSERT INTO `tbl_logo`(`thumnail`, `status`) VALUES ('$thumnail','$status')";
            $rs  = Connection()->query($sql);
            if($rs){
                echo 
                '
                        
                ';
            }
        }
    }
}
addLogo();
// end of function Addlogo

// Function GetLogo
function getLogo(){
    $sql = "SELECT * FROM `tbl_logo` ORDER BY `id` DESC";
    $rs = Connection()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo 
        '
        <tr>
            
            <td><img src="./assets/Logo/'.$row['thumnail'].'" width="80px" height="80px"/></td>
            <td>'.$row['status'].'</td>
            <td>'.$row['create_at'].'</td>
            <td width="150px">
                <a href="update-logo.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
        
        ';
    }
}
// end of function GetLogo

// function UpdateLogo
function UpdateLogo(){
    if(isset($_POST['btn-update-logo'])){
        $id = $_GET['id'];
        $status = $_POST['status'];
        $thumnail = $_FILES['thumnail']['name'];
        $tmp_thumnail = $_FILES['thumnail']['tmp_name'];
        if(empty($thumnail)){
            $thumnail = $_POST['old_thumnail'];
        }
        else{
            $thumnail = date('dmyhis').$thumnail;
            $path = './assets/Logo/'.$thumnail;
            move_uploaded_file($tmp_thumnail,$path);
        }
        if(!empty($status) && !empty($thumnail)){
            
            $sql = "UPDATE `tbl_logo` SET `thumnail`='$thumnail',`status`='$status' WHERE `id` = '$id'";
            $rs  = Connection()->query($sql);
            if($rs){
                header('location:view-logo.php');
            };
    }
}
}
UpdateLogo();
// End of function UpdateLogo


// function Delete Logo
function delete_logo(){
    if(isset($_POST['btn-delete'])){
        $delete_id = $_POST['id-delete'];
        $sql = "DELETE FROM `tbl_logo` WHERE `id`='$delete_id'";
        $rs  = Connection()->query($sql);
        if($rs){
            echo
                '
                <script>
                    $(document).ready(function() {
                        swal({
                            title: "Delete Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
                </script>
            ';
        }
    }
}
delete_logo();
// end of function DeleteLogo
function AddNews(){
    if(isset($_POST['btn-add-news'])){
        $post_by = $_SESSION['user'];
        $tittle = $_POST['tittle'];
        $type   = $_POST['type'];
        $banner = $_FILES['banner']['name'];
        $thumnail = $_FILES['thumnail']['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        
        $tmp_banner = $_FILES['banner']['tmp_name'];
        $banner = date('dmyhis').$banner;
        $path = './assets/News_img/'.$banner;
        move_uploaded_file($tmp_banner,$path);

        $tmp_thumnail = $_FILES['thumnail']['tmp_name'];
        $thumnail = date('dmyhis').$thumnail;
        $path = './assets/News_img/'.$thumnail;
        move_uploaded_file($tmp_thumnail,$path);
        if(!empty($post_by) && !empty($tittle) && !empty($type) && !empty($banner) && !empty($thumnail) && !empty($description) && !empty($category) && !empty($tmp_banner) && !empty($thumnail) && !empty($description)){
            $sql = "INSERT INTO `tbl_news`(`title`, `description`, `thumnail`, `banner`,`post_by`,`cage`, `news_type`) VALUES ('$tittle','$description','$thumnail','$banner','$post_by','$category','$type')";
            $rs  = Connection()->query($sql);
            if($rs){
                echo
                '
                    <script>
                        $(document).ready(function() {
                            swal({
                                title: "Input Already",
                                text: "clicked Okay!",
                                icon: "success",
                                button: "Okay!",
                            });
                        })
                    </script>
            ';
            }
        }
    }
}
AddNews();

function viewNews(){
    if(empty($_GET['page'])){
        $page = 1;
    }
    else{
        $page = $_GET['page'];
    }
    // echo $page;
    $total_news = ($page-1)*3;
    $sql = "SELECT tbl_user.username , tbl_news.* FROM tbl_news INNER JOIN tbl_user ON tbl_news.post_by = tbl_user.id ORDER BY `id` DESC LIMIT $total_news,3 ";
    $rs = Connection()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo '
        <tr>
            <td class="tittle">'.$row['title'].'</td>
            <td class="desc">'.$row['description'].'</td>
            <td>'.$row['news_type'].'</td>
            <td>'.$row['cage'].'</td>
            <td><img src="./assets/News_img/'.$row['thumnail'].'" / class="pic"></td>
            <td><img src="./assets/News_img/'.$row['banner'].'" / class="pic"></td>
            <td>'.$row['viwer'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['post_date'].'</td>
            <td style="
            display: flex;
            ">
                <button type="submit" 
                style="
                border: none; padding:0;
          
                ">
                    <a href="update-news.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                </button>
                
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
    ';
    }
}
function DeleteNews(){
    if(isset($_POST['btn-delete-news'])){
        $delete_id = $_POST['remove_id'];
        $sql = "DELETE FROM `tbl_news` WHERE `id` = '$delete_id'";
        $rs = Connection()->query($sql);
        if($rs){
            echo
            '
                <script>
                    $(document).ready(function() {
                        swal({
                            title: "Delete Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
                </script>
        ';
        }
    }
}
DeleteNews();
function PageGenation($table){
    $sql = "SELECT COUNT(`id`) as 'total' FROM `$table` ";
    $rs = Connection()->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $total_news = $row['total'];
    $total_page = ceil($total_news/3);
    // echo $total_page;
    for($i=1; $i<=$total_page; $i++){
        echo
        '
        <li>
            <a href="view-post-news.php?page='.$i.'">'.$i.'</a>                              
        </li>
        ';
    }
} 
function UpdateNews(){
    

    if(isset($_POST['btn-update-news'])){
        $id = $_GET['id'];
        $new_type = $_POST['type'];
        $post_by= $_SESSION['user'];
        $title = $_POST['tittle'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $thumnail = $_FILES['thumnail']['name'];
        $banner = $_FILES['banner']['name'];

        echo $old_thumnail = $_POST['old_thumnail'];
        echo $old_banner = $_POST['old_banner'];

        if(empty($thumnail)){
            $thumnail = $old_thumnail;
        }
        else{
            $tmp_thumnail = $_FILES['thumnail']['tmp_name'];
            $thumnail = date('dmyhis').$thumnail;
            $path = './assets/News_img/'.$thumnail;
            move_uploaded_file($tmp_thumnail,$path);
        }
        if(empty($banner)){
            $banner = $old_banner;
        }
        else{
            $tmp_banner = $_FILES['banner']['tmp_name'];
            $banner = date('dmyhis').$banner;
            $path = './assets/News_img/'.$banner;
            move_uploaded_file($tmp_banner,$path);
        }
        if(!empty($description) && !empty($title) && !empty($category) && !empty($post_by)){
            $sql = "UPDATE `tbl_news` SET `title`='$title',`description`='$description',`thumnail`='$thumnail',`banner`='$banner',`post_by`='$post_by',`cage`='$category',`news_type`='$new_type' WHERE `id` = '$id'";
            $rs = Connection()->query($sql);
            if($rs){
                header('location:view-post-news.php');
                echo
            '
                <script>
                    $(document).ready(function() {
                        swal({
                            title: "Delete Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
                </script>
             ';
            }
            
        }
    }

    
};
UpdateNews();


// Add footer
function addFooter(){
    if(isset($_POST['btn-add-footer'])){
        $description = $_POST['description'];
        $sql = "INSERT INTO `tbl_aboutus`(`description`) VALUES ('$description')";
         $rs = Connection()->query($sql);
         if($rs){
             echo 
             '
             <script>
                    $(document).ready(function() {
                        swal({
                            title: "Input Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
            </script>
                 
             ';
         }
    }
}
addFooter();
// End of add-footer

// // function GetFooter
function getFooter(){
    $sql = "SELECT * FROM `tbl_aboutus` ORDER BY `id` DESC";
    $rs = Connection()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo 
        '
        <tr>
            <td>'.$row['description'].'</td>
            <td width="150px">
                <a href="update-footer.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
        
        ';
    }
}
// End of Function getFooter

// Delete Footer
    function DeleteFooter(){
        if(isset($_POST['delete-id'])){
            $delete_footer = $_POST['remove-id'];
            $sql = "DELETE FROM `tbl_aboutus` WHERE `id` = '$delete_footer' ";
            $rs = Connection()->query($sql);
            if($rs){
                echo 
                '
                    <script>
                        $(document).ready(function() {
                            swal({
                                title: "Delete Already",
                                text: "clicked Okay!",
                                icon: "success",
                                button: "Okay!",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    DeleteFooter();
// End of Delete Footer

// Update Footer
    function updateFooter(){
        if(isset($_POST['btn-update-footer'])){
            $id = $_GET['id'];
            $description = $_POST['description'];
            $sql = "UPDATE `tbl_aboutus` SET `description`='$description' WHERE `id` ='$id'";
            $rs = Connection()->query($sql);
            if($rs){
                echo 
                '
                <script>
                    $(document).ready(function() {
                        swal({
                            title: "Updated Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
                </script>
                ';
            }
        }
    }
    updateFooter();
// End of Update Footer

// function addLogo
function add_footer_Logo(){
    if(isset($_POST['logo-footer'])){
    
        $url_logo = $_POST['url_logo'];
        $thumnail = $_FILES['footer_logo']['name'];
        $tmp_thumnail = $_FILES['footer_logo']['tmp_name'];
        if(!empty($url_logo) && !empty($thumnail)){
            $thumnail = date('dmyhis').'_'.$thumnail;
            $path = '../admin/assets/Footer/'.$thumnail;
            move_uploaded_file($tmp_thumnail,$path);
            $sql = "INSERT INTO `tbl_logo_footer`(`logo`,`logo_url`) VALUES ('$thumnail','$url_logo')";
            $rs  = Connection()->query($sql);
            if($rs){
                echo 
                '
                    <script>
                        $(document).ready(function() {
                            swal({
                                title: "Logo Add Success",
                                text: "clicked Okay!",
                                icon: "success",
                                button: "Okay!",
                            });
                        })
                    </script>
                ';
            }
        }
    }
}
add_footer_Logo();
// end of function Addlogo

// Function GetLogo
function get_footer_Logo(){
    $sql = "SELECT * FROM `tbl_logo_footer` ORDER BY `id` DESC";
    $rs = Connection()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo 
        '
        <tr>
            <td><img src="./assets/Footer/'.$row['logo'].'" width="100px" height="100px"/></td>
            <td>'.$row['logo_url'].'</td>
            <td>'.$row['time'].'</td>
            <td width="150px">
                <a href="update-logo-footer.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
        
        ';
    }
}
// end of function GetLogo

// function UpdateLogo
function Update_footer_Logo(){
    if(isset($_POST['update-logo-footer'])){
        $id = $_GET['id'];
        $status_footer = $_POST['status_footer'];
        $logo = $_FILES['logo']['name'];
        $tmp_logo = $_FILES['logo']['tmp_name'];
        if(empty($logo)){
            $logo = $_POST['old_logo'];
        }
        else{
            $logo = date('dmyhis').$logo;
            $path = './assets/Footer/'.$logo;
            move_uploaded_file($tmp_logo,$path);
        }
        if(!empty($status_footer) && !empty($logo)){
            
            $sql = "UPDATE `tbl_logo_footer` SET `logo`='$logo',`status`='$status_footer' WHERE `id` ='$id'";
            $rs  = Connection()->query($sql);
            if($rs){
                header('location:view-logo-footer.php');
            };
    }
}
}
Update_footer_Logo();
// End of function UpdateLogo


// function Delete Logo
function delete_footer_logo(){
    if(isset($_POST['delete-footer'])){
        $delete_id = $_POST['footer-delete'];
        $sql = "DELETE FROM `tbl_logo_footer` WHERE `id`='$delete_id'";
        $rs  = Connection()->query($sql);
        if($rs){
            echo
                '
                <script>
                    $(document).ready(function() {
                        swal({
                            title: "Delete Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
                </script>
            ';
        }
    }
}
delete_footer_logo();
// end of function DeleteLogo

// function view feedback 
function viewFeedback(){  
    $sql = "SELECT * FROM `tbl_feedback` WHERE 1 ORDER BY `id` DESC";
    $rs = Connection()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo '
        <tr>
            <td >'.$row['username'].'</td>
            <td >'.$row['email'].'</td>
            <td>'.$row['telephone'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['message'].'</td>
            <td>'.$row['feedbackDate'].'</td>
            <td style="
            display: flex;
            ">
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
    ';
    }
}
function deleteFeedback(){
    if(isset($_POST['btn-delete-feedback'])){
        $delete_feedback = $_POST['remove_feedback'];
        $sql = "DELETE FROM `tbl_feedback` WHERE `id`='$delete_feedback'";
        $rs = Connection()->query($sql);
        if($rs){
            echo 
            '
                <script>
                    $(document).ready(function() {
                        swal({
                            title: "Delete Already",
                            text: "clicked Okay!",
                            icon: "success",
                            button: "Okay!",
                        });
                    })
                </script>
            ';
        }
    }
}
deleteFeedback();
// end of function view feedback

// Add Follow 
function addFollow(){
    if(isset($_POST['btn-add-follow'])){
        $follow_name = $_POST['follow_name'];
        $url_name = $_POST['url_name'];
        $profile = $_FILES['profile']['name'];
        $tmp_profile = $_FILES['profile']['tmp_name'];
        $profile = date('dmyhis').'_'.$profile;
        $path = '../admin/assets/Follow/'.$profile;
        move_uploaded_file($tmp_profile,$path);

        $sql = "INSERT INTO `tbl_followus`(`thumnail`, `status`, `url`) VALUES ('$profile','$follow_name','$url_name')";
        $rs = Connection()->query($sql);
        if($rs){
            echo 
            '
            <script>
                $(document).ready(function() {
                    swal({
                        title: "Add Already",
                        text: "clicked Okay!",
                        icon: "success",
                        button: "Okay!",
                    });
                })
            </script>

            ';
        }
    }
}
addFollow();
// End of Add follow

// View Follow
function viewFollow(){
    $sql = "SELECT * FROM `tbl_followus` WHERE 1 ORDER BY `id` DESC ";
    $rs = Connection()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo '
        <tr>
            <td >'.$row['status'].'</td>
            <td >'.$row['url'].'</td>
            <td ><img src="./assets/Follow/'.$row['thumnail'].'" width="100px" height="100px"/></td>
            <td >'.$row['create_at'].'</td>
            
            <td width="150px">
                <a href="update-follow.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Remove
                </button>
            </td>
        </tr>
    ';
}
}
// End of View Follow

// delete follow
function deleteFollow(){
if(isset($_POST['btn-delete-follow'])){
    $delete_follow = $_POST['remove_follow'];
    $sql = "DELETE FROM `tbl_followus` WHERE `id` = '$delete_follow'";
    $rs = Connection()->query($sql);
    if($rs){
        echo 
        '<script>
            $(document).ready(function() {
                swal({
                    title: "Delete Already",
                    text: "clicked Okay!",
                    icon: "success",
                    button: "Okay!",
                });
            })
        </script>'
        ;
    }
}
}
deleteFollow();
// end of delete follow

// update follow
function updateFollow(){
    if(isset($_POST['btn-update-follow'])){
        $id = $_GET['id'];
        $follow_name = $_POST['follow_name'];
        $url_name = $_POST['url_name'];
        
        $profile = $_FILES['profile_update']['name'];
        $tmp_profile = $_FILES['profile_update']['tmp_name'];

        if(empty($profile)){
            $profile = $_POST['old_profile'];
        }
        else{
            $profile = date('dmyhis').$profile;
            $path = '../admin/assets/Follow/'.$profile;
            move_uploaded_file($tmp_profile,$path);
        }
        if(!empty($follow_name) && !empty($url_name)){
            
            $sql = "UPDATE `tbl_followus` SET `thumnail` = '$profile',`status`='$follow_name',`url`='$url_name' WHERE `id` ='$id'";
            $rs  = Connection()->query($sql);
            if($rs){
                header('location:view-follow.php');
            };
    }
}
}
updateFollow();
// end of update follow