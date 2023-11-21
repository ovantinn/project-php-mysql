<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
function connec()
{
    $connection = new mysqli('localhost', 'root', '', 'project');
    return $connection;
}
function getLogo($logo)
{
    $sql = "SELECT * FROM `tbl_logo` WHERE `status`='$logo' ORDER BY `id` DESC LIMIT 1";
    $rs = connec()->query($sql);
    $row = mysqli_fetch_assoc($rs);
    if(`status` == ' '){
        echo '123';
    }
    else{
        echo $row['thumnail'];
    }
    
}

function getNews($cate)
{
    $sql = "SELECT * FROM `tbl_news` WHERE `cage` = '$cate' ORDER BY `id` DESC LIMIT 3 ";
    $rs = connec()->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo
        '
            <div class="col-4">
                    <figure>
                        <a href="news-detail.php?id=' . $row['id'] . '">
                            <div class="thumbnail">
                                <img src="../admin/assets/News_img/' . $row['thumnail'] . '" alt="" width="350px" height="200px" style="object-fit:cover;">
                            <div class="title">
                                ' . $row['title'] . '
                            </div>
                            </div>
                        </a>
                    </figure>
            </div>

        ';
    }
}

function GetViewer($id)
{

    $get_viewer = "SELECT `viwer` FROM `tbl_news` WHERE `id` = '$id'";
    $rs_viewer = connec()->query($get_viewer);
    $row_viewer = mysqli_fetch_assoc($rs_viewer);
    $old_viewer = $row_viewer['viwer'];
    $new_viewer = $old_viewer + 1;

    $update_viwer = "UPDATE `tbl_news` SET `viwer`='$new_viewer' WHERE `id`='$id'";
    $rs_update = connec()->query($update_viwer);
}

function getnewsDetails()
{
    $id = $_GET['id'];
    GetViewer($id);
    $sql = "SELECT * FROM `tbl_news` WHERE `id` = '$id'";
    $rs  = connec()->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo
    '
        <div class="main-news">
            <div class="thumbnail">
                <img src="../admin/assets/News_img/' . $row['banner'] . '" width="730px" height="415px" style="objit-fit:contain;">
            </div>
            <div class="detail">
                <h3 class="title">' . $row['title'] . '</h3>
                <div class="date">' . $row['post_date'] . '</div>
                <div class="description">
                    ' . $row['description'] . '
            </div>
                </div>
        </div>
    ';
}
function GetPopularNews()
{
    $sql = "SELECT * FROM `tbl_news` WHERE 1 ORDER BY `viwer` DESC LIMIT 1";
    $rs  = connec()->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo
    '
    <figure>
        <a href="news-detail.php?id=' . $row['id'] . '">
        <div class="thumbnail">
            <img src="../admin/assets/News_img/' . $row['thumnail'] . '" width="730px" height="415px" style="objit-fit:contain;">
            <div class="title">
                ' . $row['title'] . '
            </div>
        </div>
        </a>                   
    </figure>
    ';
}
function GetPopularNewsRight()
{

    $sql = "SELECT * FROM `tbl_news` WHERE 1 ORDER BY `viwer` DESC LIMIT 1,2";
    $rs  = connec()->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo
        '
                <figure>
                    <a href="news-detail.php?id=' . $row['id'] . '">
                    <div class="thumbnail">
                        <img src="../admin/assets/News_img/' . $row['thumnail'] . '" width="350px" height="200px" style="objit-fit:contain;">
                        <div class="title">
                            ' . $row['title'] . '
                        </div>
                    </div>
                    </a>                   
                </figure>
            ';
    }
}

function TrendingNews()
{
    $sql = "SELECT * FROM `tbl_news` WHERE 1 ORDER BY `viwer` DESC LIMIT 2";
    $rs  = connec()->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo
        '
        <i class="fas fa-angle-double-right"></i>
            <a href="news-detail.php?id=' . $row['id'] . '">' . $row['title'] . '</a>
        ';
    }
}

function Related_News($category, $id)
{
    $sql = "SELECT * FROM `tbl_news` WHERE `cage` = '$category' AND `id` !='$id' ORDER BY `id` DESC LIMIT 2";
    $rs = connec()->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo
        '
        <figure>

        <a href="news-detail.php?id=' . $row['id'] . '">

            <div class="thumbnail">
                <img src="../admin/assets/News_img/' . $row['banner'] . '" width="350px" height="200px" style="objit-fit:contain;">
            </div>

        <div class="detail">
                <h3 class="title">' . $row['title'] . '</h3>
                <div class="date">' . $row['post_date'] . '</div>
            <div class="description">
            ' . $row['description'] . '
            </div>
        </div>

        </a>

    </figure>                      
        ';
    }
}
function getNewsByNational($category, $news_type)
{
    if(empty($_GET['page'])){
        $page = 1 ;
    }
    else{
        $page = $_GET['page'];
    }
    $start = ($page-1)*3;

    $sql = "SELECT * FROM `tbl_news` WHERE `cage` ='$category' && `news_type`='$news_type' ORDER BY `id` DESC LIMIT $start,3";
    $rs = connec()->query($sql);
    for (; $row = mysqli_fetch_assoc($rs);) {
        echo
        '
        <div class="col-4">
            <figure>
                <a href="news-detail.php?id=' . $row['id'] . '">
                    <div class="thumbnail">
                        <img src="../admin/assets/News_img/' . $row['banner'] . '" width="350px" height="200px" style="objit-fit:contain;">
                    </div>
            <div class="detail">
                    <h3 class="title">' . $row['title'] . '</h3>
                    <div class="date">' . $row['post_date'] . '</div>
                    <div class="description">
                    ' . $row['description'] . '
                    </div>
            </div>
                </a>
            </figure>       
        </div>
        ';
    }
}
function pageGenation($category,$news_type){
    $sql = "SELECT COUNT(`id`) as 'Total' FROM `tbl_news` WHERE `cage` = '$category' and `news_type`='$news_type'";
    $rs = connec()->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $total_news = $row['Total'];
    $total_page = ceil($total_news/3);
    for($i=1 ; $i<=$total_page ; $i++){
        echo 
        '
            <li>
                <a href="'.$category.'-news-'.$news_type.'.php?page='.$i.'">'.$i.'</a>
            </li>
        ';
    }
}
function Search(){
    $search = $_GET['query'];
    $sql = "SELECT * FROM `tbl_news` WHERE `title` LIKE '%$search%' ";
    $rs = connec()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo 
        ' 
        <div class="col-4">
                <figure>
                    <a href="news-detail.php?id=' . $row['id'] . '">
                        <div class="thumbnail">
                            <img src="../admin/assets/News_img/' . $row['banner'] . '" width="350px" height="200px" style="objit-fit:contain;">
                        </div>
                <div class="detail">
                        <h3 class="title">' . $row['title'] . '</h3>
                        <div class="date">' . $row['post_date'] . '</div>
                        <div class="description">
                        ' . $row['description'] . '
                        </div>
                </div>
                    </a>
                </figure>       
        </div>
        ';
        
    }
}
// get footer function
function getFooter(){
    $sql = "SELECT * FROM `tbl_aboutus` ORDER BY `id` DESC";
    $rs = connec()->query($sql);
   $row = mysqli_fetch_assoc($rs);
    echo 
    '
        <tr>
            <td>'.$row['description'].'</td>
            
        </tr>
        
        ';
};
// end of get footer
    function get_footer_Logo(){
        
        $sql = "SELECT * FROM `tbl_logo_footer` WHERE 1 ORDER BY `id` DESC ";
        $rs = connec()->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo 
            '
            <li>
                <a href="'.$row['logo_url'].'">
                     <img src="../admin/assets/Footer/'.$row['logo'].' ?>" alt="" width="40px" height="40px">
                </a>
            </li>
            ';
        }
        
        };
        
    function addContact(){
        if(isset($_POST['btn_message'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $address = $_POST['address'];
            $message = $_POST['message'];
            $sql = "INSERT INTO `tbl_feedback`(`username`, `email`, `telephone`, `address`, `message`) VALUES ('$username','$email','$telephone','$address','$message')";
            $rs = connec()->query($sql);
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
    addContact();
// view follow
function viewFollow(){
    $sql = "SELECT * FROM `tbl_followus` WHERE 1 ORDER BY `id` DESC ";
    $rs = connec()->query($sql);
    while($row = mysqli_fetch_assoc($rs)){
        echo '
            <li>
                <img src="../admin/assets/Follow/'.$row['thumnail'].'" width="40px" height="40px"/> <a href="'.$row['url'].'">'.$row['status'].'</a>
            </li>
         ';
}
}
// end of view follow


?>